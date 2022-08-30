$(document).ready(function(){
    let requestUrl = "test.php";
    let data = new FormData();
        form_data.append("requete", )
    $.ajax({
        type: 'POST',
        url: requestUrl,
        data: form_data,
        processData: false,
        contentType: false
      }).done(function (data) {
        if (npd_editor.is_json(data)) {
          var response = JSON.parse(data);
          $("#debug").html(response.message);
          if(typeof $fragment_refresh !== "undefined")
            $.ajax($fragment_refresh);

          if(npd.redirect_after == '1') {
            document.location.href = response.url;
          }
        } else {
          $("#debug").html(data);
          
        }
        wp.hooks.doAction('npd.add_to_cart_submit_form_success');
        $('.loader').hide();
        $(".npd-light-btn-wrap").show();
      })
      .fail(function (xhr, status, error) {
      

      });
})