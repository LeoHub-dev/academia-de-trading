(function(){!function(a){var b,c;return b=a.jQueryWP||a.jQuery,c=function(a){var c;return c=b(a),c.attr("href",c.attr("href").replace(/#new_tab/,"")).attr("target","_blank")},"function"==typeof b.fn.on?b(document).on("click",'a[href$="#new_tab"]',function(a){return c(this)}):"undefined"!=typeof console&&null!==console&&console.log("Page Links To: Some other code has overridden the WordPress copy of jQuery. This is bad. Because of this, Page Links To cannot open links in a new window."),b(function(){return b('a[href$="#new_tab"]').each(function(a,b){return c(b)})})}(window)}).call(this);
//# sourceMappingURL=new-tab.min.js.map