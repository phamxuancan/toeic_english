<div id="countTime" style="visibility: hidden; background: greenyellow; width: 100%;height: 50px;  position: fixed; left: 0px; display: inline-block; overflow: hidden; z-index: 9;">

    <form name="counter" style="margin-left: 60px; margin-top: 10px;">
        <label>Thời gian còn lại:</label>
        <input type="text" size="15" name="d2" readonly ='readonly'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label id="showSorce"></label>
    </form>

</div>

<div id="header" class="row">
    <div id="slider1_container" style=" position: relative; margin: 0 auto; width: 400px; height: 60px; overflow: hidden;">
        <div u="slides" class="col-lg-12" style="cursor: move; position: absolute; left: 0px; top: 0px; height: 60px;
        overflow: hidden;">
            <div>
                <img u="image" src2="../img/home/01.jpg" />
            </div>
            <div>
                <img u="image" src2="../img/home/02.jpg" />
            </div>
            <div>
                <img u="image" src2="../img/home/03.jpg" />
            </div>
            <div>
                <img u="image" src2="../img/home/04.jpg" />
            </div>
        </div>
        <!--#region Bullet Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->
        <style>
            /* jssor slider bullet navigator skin 05 css */
            /*
            .jssorb05 div           (normal)
            .jssorb05 div:hover     (normal mouseover)
            .jssorb05 .av           (active)
            .jssorb05 .av:hover     (active mouseover)
            .jssorb05 .dn           (mousedown)
            */
            .jssorb05 {
                position: absolute;
            }
            .jssorb05 div { background-position: -7px -7px; }
            .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
            .jssorb05 .av { background-position: -67px -7px; }
            .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }
            /* jssor slider arrow navigator skin 11 css */
            /*
            .jssora11l                  (normal)
            .jssora11r                  (normal)
            .jssora11l:hover            (normal mouseover)
            .jssora11r:hover            (normal mouseover)
            .jssora11l.jssora11ldn      (mousedown)
            .jssora11r.jssora11rdn      (mousedown)
            */
            .jssora11l { background-position: -11px -41px; }
            .jssora11r { background-position: -71px -41px; }
            .jssora11l:hover { background-position: -131px -41px; }
            .jssora11r:hover { background-position: -191px -41px; }
            .jssora11l.jssora11ldn { background-position: -251px -41px; }
            .jssora11r.jssora11rdn { background-position: -311px -41px; }
        </style>
    </div>
</div>