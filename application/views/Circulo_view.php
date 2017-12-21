<!DOCTYPE html>
<html>

<head>
    <?php include_once 'modules/Header.php' ; ?>
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Cargando...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php include_once 'modules/PageNavBar.php' ; ?>
    <!-- #Top Bar -->
    <?php include_once 'modules/PageMenuAndProfile.php' ; ?>

    <section class="content">
        <div class="container-fluid">
            

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="loader-container text-center">
                                <div class="icon">
                                    <div class="preloader">
                                        <div class="spinner-layer pl-black">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="title">Cargando</div>
                            </div>
                            <img src="https://i.imgur.com/uGsuRCz.jpg" class="img-responsive">
                            <div class="row clearfix">
                                <div id="myDiagramDiv" style="background-color: white; border: solid 1px white; width: 100%; height: 500px"></div>
                            </div>
                            <img src="https://i.imgur.com/j40vA7w.jpg" class="img-responsive">
                            
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </section>

    <?php include_once 'modules/Scripts.php' ; ?>
    <script src="<?= site_url('api/obtener_circulo'); ?>"></script>
    <script src="<?= asset_url(); ?>js/go-ex.js"></script>
    

    <script id="code">
    $(function () {
        init();
    });

      function init() {
        
        var $ = go.GraphObject.make;  // for conciseness in defining templates

        var blues = ['#2196f3'];
        var azul = ['#215abc'];

        myDiagram =
          $(go.Diagram, "myDiagramDiv",  // must name or refer to the DIV HTML element
            {
              initialAutoScale: go.Diagram.UniformToFill,
              contentAlignment: go.Spot.Center,
              layout: $(go.ForceDirectedLayout),
              // moving and copying nodes also moves and copies their subtrees
              "commandHandler.copiesTree": false,  // for the copy command
              "commandHandler.deletesTree": false, // for the delete command
              "draggingTool.dragsTree": false,  // dragging for both move and copy
              "undoManager.isEnabled": false
            });

        // Define the Node template.
        // This uses a Spot Panel to position a button relative
        // to the ellipse surrounding the text.
        myDiagram.nodeTemplate =
          $(go.Node, "Spot",
            {
              selectionObjectName: "PANEL",
              isTreeExpanded: false,
              isTreeLeaf: false
            },
            // the node's outer shape, which will surround the text
            $(go.Panel, "Auto",
              { name: "PANEL" },
              $(go.Shape, "Circle",
                { fill: "whitesmoke", stroke: "black" },
                new go.Binding("fill", "rootdistance", function(dist) {
                  dist = Math.min(blues.length - 1, dist);
                  return blues[dist];
                })),
              $(go.TextBlock,
                { font: "14pt sans-serif", margin: 5, stroke: "white" },
                new go.Binding("text", "key"))
            ),
            // the expand/collapse button, at the top-right corner
            $("TreeExpanderButton",
              {
                name: 'TREEBUTTON',
                width: 20, height: 20,
                alignment: go.Spot.TopRight,
                alignmentFocus: go.Spot.Center,
                // customize the expander behavior to
                // create children if the node has never been expanded
                click: function (e, obj) {  // OBJ is the Button
                    var node = obj.part;  // get the Node containing this Button
                    if (node === null) return;
                    e.handled = true;
                    expandNode(node);
                    var it = node.findNodesOutOf();
                    while (it.next()) {
                      var child = it.value;
                      if (child.data.isLeaf) {
                        child.findObject('TREEBUTTON').visible = false;
                      }
                    }
                  }
              }
            )  // end TreeExpanderButton
          );  // end Node



        myDiagram.model = new go.TreeModel(JSON.parse(chart_config));


        
      }

      function expandNode(node) {
        var diagram = node.diagram;
        diagram.startTransaction("CollapseExpandTree");
        // this behavior is specific to this incrementalTree sample:
        var data = node.data;
        if (data.isLeaf) {
          node.findObject('TREEBUTTON').visible = false;
        }
        // this behavior is generic for most expand/collapse tree buttons:
        if (node.isTreeExpanded) {
          diagram.commandHandler.collapseTree(node);
        } else {
          diagram.commandHandler.expandTree(node);
        }
        diagram.commitTransaction("CollapseExpandTree");
        myDiagram.zoomToFit();
      }

    

    </script>
</body>

</html>