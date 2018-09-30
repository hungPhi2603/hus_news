<div id="footer" class="clearfix">
    <div class="center">
        <div class="col-sm-4 left">
            <p class="footer-title text18">CHI TIẾT LIÊN HỆ</p>
            <p class="text14 footer-desc">Đại học Khoa học Tự Nhiên- Đại học Quốc Gia Hà Nội </p>
            <p>Tel: 0967 867 334</p>
            <p>Fax: (84) 043 - 8583061</p>
            <p>Email: admin@gmail.com</p>
        </div>

        <div class="col-sm-4 left quick-links">
            <p class="footer-title text18">TRUY CẬP NHANH</p>
            <a href="loaitin/21/Bong-Da" title="Bóng đá">Bóng đá</a>
            <a href="loaitin/1/Giao-Duc" title="Giáo dục">Giáo dục</a>
            <a href="loaitin/3/Du-Lich" title="Du lịch">Du lịch</a>
            <a href="loaitin/19/Dien-Anh" title="Điện ảnh">Điện ảnh</a>
        </div>

        <div class="col-sm-4 left">
            <p class="footer-title text18">TIN MỚI NHẤT</p>
            @if(isset($lastest))
            @foreach ($lastest as $l)
                <h4><b>{!! $l->TieuDe !!}</b></h4>
                <p>{!! $l->TomTat !!}</p>
                <a href="tintuc/{{$l->id}}/{{$l->TieuDeKhongDau}}" class="readmore green right text14" title="Read More">Read More >></a>
            @endforeach
            @endif
        </div>

        <!-- <div class="col-sm-3 right">
            <p class="footer-title text18">GRAB OUR NEWSLETTER</p>
            <FORM>
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="email" placeholder="Email">
                <button class="text18 green">SUBMIT</button>
            </FORM>
        </div> -->
    </div>
</div>                                                                                                  
<div id="copyright">
    <div class="center">
        <p>Copyright <i class="far fa-copyright"></i> 2018-All Rights Reserved-Hus</p>
    </div>
</div>