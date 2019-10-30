@extends("layoutFront")





@section("content")

            <!-- Banner -->
            <section id="banner">
                <div class="inner">
                    <header>
                        <h1>Welcome to Tamayouz</h1>
                    </header>

                    <div class="flex ">

                        <div>
                            <span class="icon fa-file-code-o"></span>
                            <h3>Software</h3>
                            <p>650 Projects</p>
                        </div>

                        <div>
                            <span class="icon fa-feed"></span>
                            <h3>Networks</h3>
                            <p>200 Projects</p>
                        </div>

                        <div>
                            <span class="icon fa-bug"></span>
                            <h3>Hardware</h3>
                            <p>500 Projects</p>
                        </div>

                    </div>

                    <footer>
                        <a href="#all_projects" class="button Started">Get Started</a>
                    </footer>
                </div>
            </section>


        <!-- Three -->
            <section id="all_projects" class="wrapper align-center">
                <div class="inner" >
                    <div class="flex flex-2">
                        <article>
                            <div class="image round">
                                <img src="images/pic01.jpg" alt="Pic 01" />
                            </div>
                            <header>
                                <h3>Software Projects</h3>
                            </header>
                            <p>Morbi in sem quis dui placerat ornare. Pellentesquenisi<br />euismod in, pharetra a, ultricies in diam sed arcu. Cras<br />consequat  egestas augue vulputate.</p>
                            <footer>
                                <a href="/projects/Software" class="button">Show More</a>
                            </footer>
                        </article>
                        <article>
                            <div class="image round">
                                <img src="images/pic02.jpg" alt="Pic 02" />
                            </div>
                            <header>
                                <h3>Networks Projects</h3>
                            </header>
                            <p>Pellentesque fermentum dolor. Aliquam quam lectus<br />facilisis auctor, ultrices ut, elementum vulputate, nunc<br /> blandit ellenste egestagus commodo.</p>
                            <footer>
                                <a href="/projects/Networks" class="button">Show More</a>
                            </footer>
                        </article>
                        <article>
                            <div class="image round">
                                <img src="images/pic02.jpg" alt="Pic 02" />
                            </div>
                            <header>
                                <h3>Hardware Projects</h3>
                            </header>
                            <p>Morbi in sem quis dui placerat ornare. Pellentesquenisi<br />euismod in, pharetra a, ultricies in diam sed arcu. Cras<br />consequat  egestas augue vulputate.</p>
                            <footer>
                                <a href="/projects/Hardware" class="button">Show More</a>
                            </footer>
                        </article>
                    </div>
                </div>
            </section>


@endsection