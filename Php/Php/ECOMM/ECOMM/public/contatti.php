
<?php require_once("../risorse/config.php"); ?>
<?php  include(FRONT_END . DS . 'header.php'); ?>
        

<div class="container mt-5">
<div class="col-md-8 m-auto">
    <div class="form-area">  
        <form role="form">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Contattaci</h3>
        			<div class="form-group">
						<input type="text" class="form-control"  name="nome" placeholder="tuo nome" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control"  name="oggetto" placeholder="oggetto" required>
					</div>
					<div class="form-group">
						<input type="email" class="form-control"  name="email" placeholder="email" required>
					</div>
					
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" placeholder="messaggio" maxlength="140" rows="8" name="messaggio"></textarea>
                                       
                    </div>
            
        <button type="button" id="submit" name="submit" class="btn btn-primary btn-block">Invia</button>
        </form>
    </div>
</div>
</div>
</body>
</html>