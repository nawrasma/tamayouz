@extends("layoutFront",$seasons)





@section("content")

            <!-- Banner -->
            <section id="banner">
                <div class="inner">
                    <header>
                        <h1>Welcome to Tamayouz</h1>
                    </header>

                    <div class="flex ">

                        <div>
                            <span class="icon fa-list-ul"></span>
                            <h3>Season</h3>
                            <p>{{ $seasons->count() }} Seasons</p>
                        </div>

                        <div>
                            <span class="icon fa-braille"></span>
                            <h3>Category</h3>
                            <p>{{ $categories->count() }} Categories</p>
                        </div>

                        <div>
                            <span class="icon fa-folder-open"></span>
                            <h3>Project</h3>
                            <p>{{ $projects->count() }} Projects</p>
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
                    <h2 id="content">The Best Of Projects</h2>
                    <div class="flex flex-2">
                        @foreach ($best as $item)
                        
                        <article>
                            <div class="image round">
                                <img src="{{ asset('images/'.$item->pro_photo) }}" alt="{{$item->pro_photo}}" />
                            </div>
                            <header>
                                <h3>{{ $item->pro_name }}</h3>
                            </header>
                            <p>{{ substr($item->pro_desc,0,180) }}</p>
                            <footer>
                                <a href="/singleProject/{{$item->id}}" class="button">Show More</a>
                            </footer>
                        </article>

                        @endforeach
                    </div>
                </div>
            </section>

            <hr  style="background-color:#6cc091;color:#6cc091;width:94%;margin-left:3%;font-size:15px;border:none;height:3px;" />

            <section>
                <div class="inner">
                    <h2 id="content">The Last Project </h2>
                    <div class="lastDesc">
                        <p>
                            <span class="image left">
                                <img src="{{ asset('images/'.$last->pro_photo) }}" alt="{{$last->pro_photo}}" />
                            </span>
                            <span class="lastName">{{ $last->pro_name }}</span>

                            {{ substr($last->pro_desc,0,1050) }}

                            </p>
                        <a href="/singleProject/{{$last->id}}" class="button">Show More</a>
                    </div>
                </div>
            </section>


@endsection