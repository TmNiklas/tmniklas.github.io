<?php include("inc/header.php"); ?>

<div class="container">
    <div class="row">
      <div class="d-flex justify-content-center">
        <div class="glass">
          <div class="card" style="width: auto;">
            <div class="card-body">
              <div id="board">
                <div class="cell" onclick="placeMarker(this)"></div>
                <div class="cell" onclick="placeMarker(this)"></div>
                <div class="cell" onclick="placeMarker(this)"></div>
                <div class="cell" onclick="placeMarker(this)"></div>
                <div class="cell" onclick="placeMarker(this)"></div>
                <div class="cell" onclick="placeMarker(this)"></div>
                <div class="cell" onclick="placeMarker(this)"></div>
                <div class="cell" onclick="placeMarker(this)"></div>
                <div class="cell" onclick="placeMarker(this)"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
		<button onclick="reset()">Reset</button>
		<p id="turn">Player 1's Turn</p>
	</div>

<?php include("inc/footer.php"); ?>

