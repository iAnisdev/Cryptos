<?php
  // this imports the header folder instead of re writing out the header code on every page it can be stored in one place and then moved
  require "header.php";
?>
    <style>
        .update_btn {
            display: none;
        }
    </style>
    <main>
        <div class="container">
            <section class="section-default">
                <h3 class="text-info font-weight-bold text-center" style="margin-top: 5vh;">Your Portfolio</h3>
                <div class="card-deck" style="margin-bottom: 5vh;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title  text-success font-weight-bold">Total Value:</h5>
                            <p class="card-text font-weight-bold">$0</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-primary font-weight-bold">Change this month</h5>
                            <p class="card-text font-weight-bold">0%</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title  text-secondary font-weight-bold">Add Currency</h5>
                            <p class="card-text text-right">
                                <button type="button" class="btn btn-secondary add_btn" data-toggle="modal" data-target="#exampleModal">Add Currency</button>
                                <button type="button" class="btn btn-info update_btn" data-toggle="modal" data-target="#updateModal">Update Currency</button>
                            </p>
                        </div>
                    </div>
                </div>
                
                        <?php
                        $uid=  $_SESSION['id'];
                        $sql = "SELECT * FROM coinbase where user_id='$uid'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            echo "<style>.update_btn{ display:block;} .add_btn{ display:none;}</style>";
                            echo '<table class="table  table-bordered table-dark table-striped  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Coins</th>
                                    <th scope="col">holding</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">%change</th>
                                </tr>
                            </thead>
                            <tbody>';
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {

                                $btc = $row["btc"];
                                $eth = $row['eth'];
                                $mon = $row['mon'];
                                $ltc = $row['ltc'];
                                $rpp = $row['rpp'];
                        }
                        if($btc !=0){
                            ?>
                            <tr>
                                <td scope="col">Bitcoin</td>
                                <td scope="col">
                                    <?=$btc?>
                                </td>
                                <td scope="col">$
                                    <?=$btc * 3,590?>
                                </td>
                                <td scope="col">+20%</td>
                            </tr>
                            <?php  }

if($eth !=0){
    ?>

                                <tr>
                                    <td scope="col">eth</td>
                                    <td scope="col">
                                        <?=$eth?>
                                    </td>
                                    <td scope="col">$
                                        <?=$eth * 120?>
                                    </td>
                                    <td scope="col">+20%</td>
                                </tr>
                                <?php }
                        if($mon !=0){
                            ?>
                                    <tr>
                                        <td scope="col">mon</td>
                                        <td scope="col">
                                            <?=$mon?>
                                        </td>
                                        <td scope="col">
                                            <?=$mon * 45?>
                                        </td>
                                        <td scope="col">+20%</td>
                                    </tr>
                                    <?php }
                        if($ltc !=0){
                            ?>
                                        <tr>
                                            <td scope="col">itc</td>
                                            <td scope="col">
                                                <?=$ltc?>
                                            </td>
                                            <td scope="col">$
                                                <?=$ltc * 30?>
                                            </td>
                                            <td scope="col">+20%</td>
                                        </tr>
                                        <? }
                        if($rpp !=0){
                            ?>
                                            <tr>
                                                <td scope="col">rpp</td>
                                                <td scope="col">
                                                    <?=$rpp?>
                                                </td>
                                                <td scope="col">$
                                                    <?=$rpp * 0.32?>
                                                </td>
                                                <td scope="col">+20%</td>
                                            </tr>

                                            <?php
                                            echo '
                                            </tbody>
                                        </table>';
                        }
                     }
                      else {
                            echo '<div class="text-center">
                            <div class="alert alert-warning" role="alert">
                                No Crypto coins yet. Please add coin first!
                            </div></div>';
                        }
                ?>

            </section>
        </div>
    </main>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Currency List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body container">
                    <div class="row bg-dark text-light" style="padding: 5px; margin-bottom: 2px;">
                        <div class="col">
                            <label class="font-weight-bold">Coin</label>
                        </div>
                        <div class="col">
                            <label class="font-weight-bold">Price</label>
                        </div>
                        <div class="col">
                            <label class="font-weight-bold">Enter Amount</label>
                        </div>
                    </div>
                    <form class="form-coin" action="includes/addcoin.inc.php" method="post">
                        <div class="row" style="padding: 5px; margin-top: 3px;">
                            <div class="col">
                                <label for="formGroupExampleInput" class="font-weight-bold">Bitcoin</label>
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput" class="font-italic font-weight-bold">$3,590</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value="0" name="btcqt" placeholder="Enter Quantity">
                            </div>
                        </div>
                        <div class="row" style="padding: 5px; margin-top: 3px;">
                            <div class="col">
                                <label for="formGroupExampleInput" class="font-weight-bold">Ethereum</label>
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput" class="font-italic font-weight-bold">$120</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value="0" name="ethqt" placeholder="Enter Quantity">
                            </div>
                        </div>
                        <div class="row" style="padding: 5px; margin-top: 3px;">
                            <div class="col">
                                <label for="formGroupExampleInput" class="font-weight-bold">Monero</label>
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput" class="font-italic font-weight-bold">$45</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value="0" name="monqt" placeholder="Enter Quantity">
                            </div>
                        </div>
                        <div class="row" style="padding: 5px; margin-top: 3px;">
                            <div class="col">
                                <label for="formGroupExampleInput" class="font-weight-bold">Litecoin</label>
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput" class="font-italic font-weight-bold">$30</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value="0" name="ltcqt" placeholder="Enter Quantity">
                            </div>
                        </div>
                        <div class="row" style="padding: 5px; margin-top: 3px;">
                            <div class="col">
                                <label for="formGroupExampleInput" class="font-weight-bold">Ripple</label>
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput" class="font-italic font-weight-bold">$0.32</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value="0" name="rppqt" placeholder="Enter Quantity">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name='add-coin' class="btn btn-primary">Add Coins</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
  // footer is included for same reason as header .
  require "footer.php";
?>