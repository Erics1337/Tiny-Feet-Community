<?php require APPROOT . '/views/inc/header.php'; ?>
<main role="main">



    <div class="container aboutContainer" style="background-color: white;">
        <div class="jumbotron">
            <div class="container" style="height: 620px;">
                <h1 class="display-3">Welcome to the Tiny Feet Community!</h1>
                <br>
                <h4>This is a community of eco-consious people as well as environmental management professionals who seeek to
                    offer information and advice to aid in developing your community's climate action plan</h4>
                <br>
                <p><a class="btn btn-primary btn-lg" href="https://www.tinyfeet.app" role="button">Try the Toolkit »</a></p>
            </div>

            <div class="container">



                <!-- Example row of columns -->

                <h1 class="columnsHeader text-center">How Tiny Feet Toolkit can aid your community</h1>

                <div class="row">
                    <div class="col-md-4">
                        <h2>Bar Chart</h2>
                        <p>View greenhouse gas data produced by your community and compare it to other communities in Colorado. </p>
                        <p><a class="btn btn-secondary" href="https://www.tinyfeet.app/emissions/chart" role="button">View page »</a></p>
                    </div>
                    <div class="col-md-4">
                        <h2>Region Map</h2>
                        <p>Visualize greenhouse gas emission data in the form of a pie chart for each zip code or county region in Colorado. </p>
                        <p><a class="btn btn-secondary" href="https://www.tinyfeet.app/emissions/map" role="button">View page »</a></p>
                    </div>
                    <div class="col-md-4">
                        <h2>Recommendations Filter</h2>
                        <p>Get a list of climate action planning solutions tailored for your community's specific needs and interests.</p>
                        <p><a class="btn btn-secondary" href="https://www.tinyfeet.app/recommendations" role="button">View page »</a></p>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>

                <div class="row">
                    <div class="col-md-auto">
                        <img src="<?php echo URLROOT; ?>/public/img/engineer.jpg" height="300"></img>
                        <br>
                    </div>
                    <div class="col text-left my-auto">
                        <h2>Use the toolkit to identify the unique problems and solutions facing your community in reducing GHG emissions</h2>
                        <h6>Find advice in the forums from other Tiny Feet community members on how to implement the recommended actions for your area in your community!</h6>

                    </div>
                </div>
                <div class="row">
                    <div class="col text-right my-auto">
                        <h2>Submit a link to data you found online!</h2>
                        <h6>Help us grow our database!</h6>
                        <br>
                    </div>
                    <div class="col-md-auto">
                        <img src="<?php echo URLROOT; ?>/public/img/workers.jpg" height="300"></img>


                    </div>
                </div>
                <div class="text-center aboutFooter">
                    <h1 class="columnsHeader my-auto">Try posting about issues effecting your community in our forums!</h1>
                    <p><a class="btn btn-primary btn-lg my-auto" href="<?php echo URLROOT; ?>/posts" role="button">Discuss with others »</a></p>
                </div>


            </div>
        </div>

        <a href='https://www.freepik.com/vectors/infographic'>Infographic vectors created by vectorjuice - www.freepik.com</a>

    </div> <!-- /container -->

</main>
<?php require APPROOT . '/views/inc/footer.php'; ?>