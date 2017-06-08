<?php 
# HEADER
include_once('../header.php');
?>

<div class="container">
	<div class="row">
		<h1 class="page-header">Add New Card <small>Insert in Database</small></h1>
		<form class="form-horizontal">

			<div class="form-group group-deck">
				<label for="inputTitle" class="col-sm-2 control-label">Deck</label>
				<div class="col-sm-6">
					<select name="optionDeck">
					<option value="0">Undefined</option>
					<option value="1">Neutral</option>
					<option value="2">Northern</option>
					<option value="3">Nilfgaard</option>
					<option value="4">Scoia'tael</option>
					<option value="5">Monsters</option>
					</select>
				</div>
			</div>

			<div class="form-group group-title">
				<label for="inputTitle" class="col-sm-2 control-label">Title</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="inputTitle" placeholder="Title">
				</div>
			</div>

		  	<div class="form-group group-range">
				<label for="inputTitle" class="col-sm-2 control-label">Combat Range</label>
				<div class="col-sm-6">
					<select name="optionDeck">
					<option value="0">Spell</option>
					<option value="1">Close</option>
					<option value="2">Range</option>
					<option value="3">Siege</option>
					</select>
				</div>
			</div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-6">
		      <button type="submit" class="btn btn-default">Sign in</button>
		    </div>
		  </div>
		</form>
	</div>
</div>

<?php 

# FOOTER
include_once('../footer.php');

?>