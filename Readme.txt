1. Create a google form and connect it with a google spreadsheet response
2. Set cookies using javasscript server and connect the cookies in an input field
3. Connect the visitor with google forms input filed id
4. Script : 

<script>
function connectVisitorToGoogle() {
  var visitor_ip=$('#visitor_ip').val();
  var visitor_browser=$('#visitor_browser').val();
  var visitor_timezone=$('#visitor_timezone').val();
  $.ajax({
  url:"https://docs.google.com/forms/d/form_id/formResponse",data:{"entry.1573948491":visitor_ip,"entry.1901953465":visitor_browser,"entry.1710659919":visitor_timezone},type:"POST",dataType:"xml"
  });
}
</script>