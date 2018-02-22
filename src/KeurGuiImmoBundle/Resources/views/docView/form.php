<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .modal-header, h4, .close {
      background-color: #008080;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
</head>
<body>

<div class="container">
  
  
  <button type="button" class="btn btn-default btn-lg" id="myBtn">S'inscrire</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class=""></span> Formulaire</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class=""></span> Prenom</label>
              <input type="text" class="form-control" id="usrname" placeholder="Entez votre prenom">
            </div>
             <div class="form-group">
              <label for="usrname"><span class=""></span>Nom</label>
              <input type="text" class="form-control" id="usrname" placeholder="Entez votre nom">
            </div>
            <div class="form-group">
              <label for="psw"><span class=""></span> Telephone</label>
              <input type="text" class="form-control" id="psw" placeholder="Entez votre numero ">
            </div>
             <div class="form-group">
              <label for="psw"><span class=""></span> Adresse</label>
              <input type="text" class="form-control" id="psw" placeholder="Entez votre adresse">
            </div>
            <div class="form-group">
              <label for="psw"><span class=""></span> Email</label>
              <input type="text" class="form-control" id="psw" placeholder="Entez votre email">
            </div>


              <button type="submit" class=""><span class=""></span> Enregistrer</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn btn-info btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
          
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").on("click",function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>
