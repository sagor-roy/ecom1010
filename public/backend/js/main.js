/*------------------------------------------------------------------
. MAIN JS
-------------------------------------------------------------------*/

      // side navbar
      $("#sideBarOpen").click(function(){
        let sideNavs = $("#sideNavs");
        sideNavs.removeClass('sideBar_close');
    });
 
    $("#sideBarClose").click(function(){
        let sideNavs = $("#sideNavs");
        sideNavs.addClass('sideBar_close');
    });

    // data table
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  
   