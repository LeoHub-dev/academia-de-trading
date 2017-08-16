<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model {

    public $id_course;
    public $id_user;

    public function setIdCourse($id)
    {
        $this->id_course = $id;
    }

    public function setIdUser($id)
    {
        $this->id_user = $id;
    }

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getCourse()
    {
        $course = NULL;

        $this->db->where('id_course',$this->id_course);

        $this->db->join('course_teacher', 'course_teacher.id_teacher = course.id_teacher', 'left');

        $query_course = $this->db->get('course');

        if($query_course->num_rows() > 0)
        {
            foreach ($query_course->result() as $course)
            {
                return $course;
            }
        }

        return $course;
        
    }

    public function getParticipant()
    {
        $this->db->where('id_course',$this->id_course);
        $this->db->where('id_user',$this->id_user);

        $query_course = $this->db->get('course_participants');

        if($query_course->num_rows() > 0)
        {
            foreach ($query_course->result() as $course)
            {
                return $course;
            }
        }

        return FALSE;
        
    }


    public function insertParticipant()
    {
        $NY = new DateTimeZone("UTC");
        $actual_datetime = new DateTime(Null,$NY);

        $data = array(
           'id_user' => $this->id_user,
           'id_course' => $this->id_course,
           'actual_level' => 1,
           'start_date' => $actual_datetime->format('Y-m-d H:i:s')
        );

        $query = $this->db->insert('course_participants',$data); 

        if($query)
        {
            return (object) $data;
        }
    }

    public function checkNextLevel()
    {
        $participant = $this->getParticipant();

        if(!$participant)
        {
            $participant = $this->Course_model->insertParticipant();
        }
        $actual_level = $this->getCourseVideo($participant->actual_level);

        if($this->getCourseVideo($participant->actual_level+1))
        {
            $NY = new DateTimeZone("UTC");
            $actual_datetime = new DateTime(Null,$NY);
            $datetime = new DateTime($participant->start_date,$NY);
            $datetime->modify('+'.$actual_level->time.' minutes');

            if($participant && $actual_level)
            {
                if($actual_datetime > $datetime)
                {

                    return TRUE;
                }
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }

        
        
    }



    public function updateParticipantTime()
    {
        $NY = new DateTimeZone("UTC");
        $actual_datetime = new DateTime(Null,$NY);

        $this->db->set('start_date', $actual_datetime->format('Y-m-d H:i:s'));
        $this->db->where('id_user', $this->id_user);
        $this->db->where('id_course',$this->id_course);
        
        $query = $this->db->update('course_participants');

        if($query)
        {
            return TRUE;
        }
    }

    public function moveToNextLevel()
    {
        $participant = $this->getParticipant();

        $data = array('actual_level' => ($participant->actual_level+1));
        $this->db->where('id_user', $this->id_user);
        $this->db->where('id_course',$this->id_course);
        
        $query = $this->db->update('course_participants', $data);

        if($query)
        {
            return TRUE;
        }
        
    }

    public function getCourseVideo($level)
    {
        $this->db->where('id_course',$this->id_course);
        $this->db->where('level',$level);

        $query_course = $this->db->get('course_videos');

        if($query_course->num_rows() > 0)
        {
            foreach ($query_course->result() as $course)
            {
                return $course;
            }
        }

        return FALSE;
    }

    public function getCourseLastLevel($id_course)
    {
        $last_level = NULL;

        $this->db->where('id_course',$this->id_course);

        $query_course = $this->db->get('course_videos');

        if($query_course->num_rows() > 0)
        {
            foreach ($query_course->result() as $course)
            {
                $last_level = $course;
            }
        }

        return $last_level;
    }

    public function addCourse($title,$image,$teacher)
    {
        $data = array(
           'name' => $title,
           'image' => $image,
           'id_teacher' => $teacher
        );

        $query = $this->db->insert('course',$data); 

        if($query)
        {
            return $this->db->insert_id();
        }
        else
        {
            return FALSE;
        }
    }

    public function addTeacher($teacher,$teacher_image)
    {
        $data = array(
           'teacher_name' => $teacher,
           'teacher_image' => $teacher_image
        );

        $query = $this->db->insert('course_teacher',$data); 

        if($query)
        {
            return $this->db->insert_id();
        }
        else
        {
            return FALSE;
        }
    }

    public function addVideo($id_course,$title,$video,$level,$time)
    {
        $video_link = (isset(explode('/',$video)[3])) ? explode('/',$video)[3] : 0;

        if($video_link == NULL)
        {
            $video_link = 0;
        }

        $data = array(
            'id_course' => $id_course,
            'title' => $title,
            'video' => $video_link,
            'level' => $level,
            'time' => $time
        );

        $query = $this->db->insert('course_videos',$data); 

        if($query)
        {
            return $this->db->insert_id();
        }
        else
        {
            return FALSE;
        }
    }

    public function listCourses()
    {
        $list_courses = NULL;


        $query_course = $this->db->get('course');

        if($query_course->num_rows() > 0)
        {
            foreach ($query_course->result() as $course)
            {
                $list_courses[$course->id_course]['data'] = $course;
                $list_courses[$course->id_course]['videos'] = NULL;

                $this->db->where('id_course',$course->id_course);

                $query_video = $this->db->get('course_videos');

                if($query_video->num_rows() > 0)
                {
                    foreach ($query_video->result() as $video)
                    {
                        $list_courses[$course->id_course]['videos'][] = $video;
                    }
                }
            }
        }

        return $list_courses;
        
    }

    public function listTeachers()
    {
        $list_teachers = NULL;


        $query_course = $this->db->get('course_teacher');

        if($query_course->num_rows() > 0)
        {
            foreach ($query_course->result() as $teacher)
            {
                $list_teachers[$teacher->id_teacher]['data'] = $teacher;
            }
        }

        return $list_teachers;
        
    }


    public function listCoursesUser($id_user)
    {
        $list_courses = NULL;


        $query_course = $this->db->get('course');

        if($query_course->num_rows() > 0)
        {
            foreach ($query_course->result() as $course)
            {
                $list_courses[$course->id_course]['data'] = $course;

                $list_courses[$course->id_course]['participant'] = FALSE;

                $this->db->where('id_user',$id_user);

                $this->db->where('id_course',$course->id_course);

                $query_participant = $this->db->get('course_participants');

                if($query_participant->num_rows() > 0)
                {
                    foreach ($query_participant->result() as $participant)
                    {
                        $list_courses[$course->id_course]['participant'] = $participant;
                    }
                }

                $list_courses[$course->id_course]['videos'] = NULL;

                $this->db->where('id_course',$course->id_course);

                $query_video = $this->db->get('course_videos');

                if($query_video->num_rows() > 0)
                {
                    foreach ($query_video->result() as $video)
                    {
                        $list_courses[$course->id_course]['videos'][] = $video;
                    }
                }
            }
        }

        return $list_courses;
        
    }






 
   
}
?>