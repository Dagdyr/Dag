<?php
require_once('header.php');
?>
<div class="container my-5">
       <h1 class="text-center">Добавить статью</h1>
       <div class="col-5 mx-auto">
           <form action="router.php" method="post">
               <div class="mb-3">
                   <input type="text" class="form-control" name="title" placeholder="Заголовок">
               </div>
               <div class="mb-3">
                   <input type="text" class="form-control" name="content" placeholder="Контент">
               </div>
               <div class="mb-3">
                   <input type="text" class="form-control" name="author" placeholder="Автор">
               </div>
               <div class="mb-3">
                   <input type="submit" class="btn btn-primary form-control">
               </div>
           </form>
       </div>
   </div>



  </body>
</html>