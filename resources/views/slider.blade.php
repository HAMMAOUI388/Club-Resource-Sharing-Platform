<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indusry 4.0</title>
    <link rel="stylesheet" href="{{ secure_secure_asset('slider/style.css') }}">

    @vite(['resources/js/app.js']) <!-- This loads both JS and CSS from Vite -->

</head>
<body>


    <div class="carousel">
        <!-- list item -->
        <div class="list">
            <div class="item">
                <img src="{{ secure_asset('slider/images/1img.jpeg') }}" alt="Slider Image">
                <div class="content">
                    <div class="author">INSUYTRY4.0</div>
                    <div class="title">DESIGN SLIDER</div>
                    <div class="topic">Theme</div>
                    <div class="des">
                        <!-- lorem 50 -->
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ secure_asset('slider/images/2img.jpeg') }}" alt="Slider Image">
                <div class="content">
                    <div class="author">qwer</div>
                    <div class="title">DESIGN SLIDER</div>
                    <div class="topic">theme</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ secure_asset('slider/images/3img.jpeg') }}" alt="Slider Image">
                <div class="content">
                    <div class="author">czjyxcvb</div>
                    <div class="title">DESIGN SLIDER</div>
                    <div class="topic">chi haja</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ secure_asset('slider/images/4img.jpeg') }}" alt="Slider Image">
                <div class="content">
                    <div class="author">poiuztjhg</div>
                    <div class="title">DESIGN SLIDER</div>
                    <div class="topic">ci haja 3awd</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            <div class="item">
                <img src="{{ secure_asset('slider/images/1img.jpeg') }}" alt="Slider Image">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ secure_asset('slider/images/2img.jpeg') }}" alt="Slider Image">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ secure_asset('slider/images/3img.jpeg') }}" alt="Slider Image">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ secure_asset('slider/images/4img.jpeg') }}" alt="Slider Image">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev">&#8249;</button>
            <button id="next">&#8250;</button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>

    <script src="{{ secure_secure_asset('slider/app.js') }}"></script></body>
</html>