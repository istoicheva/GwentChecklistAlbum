<?php 
# HEADER
include_once('../header.php');

?>
<div class="container-fluid">
      <div class="row-fluid">
        <h1 class="page-header">Dashboard</h1>

        <div class="row placeholders">
          <div class="col-md-2 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>All Cards</h4>
            <span class="text-muted">0 out of 100</span>
          </div>
          <div class="col-md-2 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Neutral</h4>
            <span class="text-muted">3 out of 20</span>
          </div>
          <div class="col-md-2 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Northern</h4>
            <span class="text-muted">3 out of 20</span>
          </div>
          <div class="col-md-2 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Nilfgaard</h4>
            <span class="text-muted">3 out of 20</span>
          </div>
          <div class="col-md-2 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Scoia'tael</h4>
            <span class="text-muted">3 out of 20</span>
          </div>
          <div class="col-md-2 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Monsters</h4>
            <span class="text-muted">3 out of 20</span>
        </div>
      </div>
      <div class="row-fluid">
          <h2 class="sub-header">Card List</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Deck</th>
                  <th>Title</th>
                  <th>Range</th>
                  <th>Value</th>
                  <th>Ability</th>
                  <th>Type</th>
                  <th>Location</th>
                  <th>Territory</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($all_cards as $card) : ?>
                <tr class="<?php echo $card['id'] ?>">
                  <td class="id id-<?php echo $card['id'] ?>"><?php echo $card['id'] ?></td>
                  <td class="deck deck-<?php echo $card['deck'] ?>"><?php echo $card['deck'] ?></td>
                  <td class="title title-<?php echo $card['title'] ?>"><?php echo $card['title'] ?></td>
                  <td class="rtype rtype-<?php echo $card['range_type']; ?>"><?php echo $card['range_type']; ?></td>
                  <td class="value value-<?php echo $card['value']; ?>"><?php echo $card['value']; ?></td>
                  <td class="ability ability-<?php echo $card['ability']; ?>"><?php echo $card['ability']; ?></td>
                  <td class="type type-<?php echo $card['type']; ?>"><?php echo $card['type']; ?></td>
                  <td class="location location-<?php echo $card['location']; ?>"><?php echo $card['location']; ?></td>
                  <td class="territory territory-<?php echo $card['territory']; ?>"><?php echo $card['territory']; ?></td>
                  <td><a class="btn btn-default" href="http://dev.3ammood.com/project01/viewcard.php?id=<?php echo $card['id'] ?>">Edit</a></td>
                </tr>
               <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
    </div>

<?php 

# FOOTER
include_once('../footer.php');

?>