

         <div class="col-sm-8 text-secondary">
             <form action="" method="POST">

                 <select id="multi_option" multiple name="username[]" placeholder="Select Users" data-silent-initial-value-set="false">

                     <option value="1">hgjg</option>
                     <option value="2">dfg</option>
                     <option value="3">hgfdgfdjg</option>
                     <option value="4">hgjdfgfdsgfdgfdg</option>
                     <input type="submit" value="asdf">                    





                 </select>
             </form>
             <p>
         <?php
         if(isset($_POST['asdf'])){
                foreach ($_POST['username'] as $tempusername) {
        
                    
                       echo($tempusername);
                    

         }
        }

            ?>
             </p>