@extends('layouts.page')

@section('content')
    <div id="content">
            <div id="slideshow">
                <div class="center">
                    <div class="slideshow-container">

                        <div class="mySlides fade">
                            <img src="assets/img/slideshow1.jpg" alt="slideshow1">
                            <div class="text">Caption Text</div>
                        </div>

                        <div class="mySlides fade">
                            <img src="assets/img/slideshow2.jpg" alt="slideshow2">
                            <div class="text">Caption Two</div>
                        </div>

                        <div class="mySlides fade">
                            <img src="assets/img/slideshow3.jpg" alt="slideshow3">
                            <div class="text">Caption Three</div>
                        </div>

                        <div class="mySlides fade">
                            <img src="assets/img/slideshow4.jpg" alt="slideshow4">
                            <div class="text">Caption Four</div>
                        </div>

                        <div class="mySlides fade">
                            <img src="assets/img/slideshow5.jpg" alt="slideshow5">
                            <div class="text">Caption Five</div>
                        </div>

                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    </div>
                    <br>

                    <div class="div-dots">
                      <span class="dot" onclick="currentSlide(1)"></span> 
                      <span class="dot" onclick="currentSlide(2)"></span> 
                      <span class="dot" onclick="currentSlide(3)"></span> 
                      <span class="dot" onclick="currentSlide(4)"></span> 
                      <span class="dot" onclick="currentSlide(5)"></span> 
                    </div>

                </div>
            </div>

            <div id="topic" class="clearfix">
                <div class="center">
                    <div class="four-col left">
                        <i class="fas fa-graduation-cap"></i>
                        <h2><p class="green text20">Giáo dục</p></h2>
                        <p class="text14">Cập nhật thông tin về công tác giáo dục và khuyến học trên cả nước. Thông tin đa dạng và phản ánh nhanh, chính xác các vấn đề, sự kiện của ngành giáo dục.</p>
                    </div>

                    <div class="four-col left">
                        <i class="far fa-futbol"></i>
                        <h2><p class="green text20">Thể thao</p></h2>
                        <p class="text14">Cập nhật thông tin về công tác giáo dục và khuyến học trên cả nước. Thông tin đa dạng và phản ánh nhanh, chính xác các vấn đề, sự kiện của ngành giáo dục.</p>
                    </div>

                    <div class="four-col left">
                        <i class="fas fa-plane-departure"></i>
                        <h2><p class="green text20">Du lịch</p></h2>
                        <p class="text14">Cập nhật thông tin về công tác giáo dục và khuyến học trên cả nước. Thông tin đa dạng và phản ánh nhanh, chính xác các vấn đề, sự kiện của ngành giáo dục.</p>
                    </div>

                    <div class="four-col right">
                        <i class="fas fa-graduation-cap"></i>
                        <h2><p class="green text20">Giáo dục</p></h2>
                        <p class="text14">Cập nhật thông tin về công tác giáo dục và khuyến học trên cả nước. Thông tin đa dạng và phản ánh nhanh, chính xác các vấn đề, sự kiện của ngành giáo dục.</p>
                    </div>
                </div>
            </div>

            <hr class="center">

            <div id="quick-news" class="clearfix">
                <div class="center">
                    <div class="four-col left">
                        <img src="assets/img/quick-news1.jpg" alt="thumb1">
                        <h3><p class="text16">Title</p></h3>
                        <p class="text14">Portortornec condimenterdum eget consectetuer condis consequam pretium pellus sed mauris enim. Puruselit mauris nulla hendimentesque elit semper nam a sapien urna sempus.</p>
                        <a href="#details" class="right text14 green details">View details >></a>
                    </div>

                    <div class="four-col left">
                        <img src="assets/img/quick-news1.jpg" alt="thumb1">
                        <h3><p class="text16">Title</p></h3>
                        <p class="text14">Portortornec condimenterdum eget consectetuer condis consequam pretium pellus sed mauris enim. Puruselit mauris nulla hendimentesque elit semper nam a sapien urna sempus.</p>
                        <a href="#details" class="right text14 green details">View details >></a>
                    </div>

                    <div class="four-col left">
                        <img src="assets/img/quick-news1.jpg" alt="thumb1">
                        <h3><p class="text16">Title</p></h3>
                        <p class="text14">Portortornec condimenterdum eget consectetuer condis consequam pretium pellus sed mauris enim. Puruselit mauris nulla hendimentesque elit semper nam a sapien urna sempus.</p>
                        <a href="#details" class="right text14 green details">View details >></a>
                    </div>

                    <div class="four-col right">
                        <img src="assets/img/quick-news1.jpg" alt="thumb1">
                        <h3><p class="text16">Title</p></h3>
                        <p class="text14">Portortornec condimenterdum eget consectetuer condis consequam pretium pellus sed mauris enim. Puruselit mauris nulla hendimentesque elit semper nam a sapien urna sempus.</p>
                        <a href="#details" class="right text14 green details">View details >></a>
                    </div>
                </div>
            </div>
        </div>  
@endsection