<?php $title = 'accueil'; ?>
<?php ob_start(); ?>


    <div class="container">


    <div class="row">
        <div class="col-md-6 col-12 col-lg-8">
            <form>
                <div class="row">
                    <div class="col-12 col-lg-3 col-md-4 cercle" >
                        <br>
                        <br>

                        <p>PHOTO</p>
                        <br>
                        <br>
                        <br>
                        <br>


                    </div>
                    <div class="col-12 col-lg-9 col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Template name</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">subjet</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>

                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Message Type</label>
                    <select class="form-control" >
                        <option>Email + Push</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <h2>send to group</h2>

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked value="1">Top management
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="2">Marketing department
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="3">Marketing department
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Supply² department
                    </label>
                </div>
                <br>
                <div class="form-actions">
                    <button class="btn btn-primary" ><span class="glyphicon glyphicon-arrow-left"></span>Valider</button>
                    <button type="submit" class="btn btn-outline-dark" > Annuler</button>
                </div>
            </form>

        </div>

        <div class="col-md-6 col-12 col-lg-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top img-thumbnail" src="http://placehold.it/320x200" alt="ALT NAME">
                <div class="card-body">
                    <h5 class="card-title">Thumbnail</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button  class="btn btn-primary">bouton</button>
                    <button type="button" class="btn btn-outline-dark">button</button>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label >Tap target</label>
                <select class="form-control" >
                    <option>Profil Screem</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <label >Set Type</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    <span class="badge badge-success">News</span>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    <span class="badge badge-info">reports</span>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    <span class="badge badge-warning">Documents</span>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    <span class="badge badge-primary">Media</span>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    <span class="badge badge-secondary">Test</span>
                </label>
            </div>
            <br>
            <button type="button" class="btn btn-danger">Supprimer</button>

        </div>




    </div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>