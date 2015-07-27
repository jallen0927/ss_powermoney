<footer>
    <div class="social">
        <div class="container">
            <div class="col-xs-9 links no-padding">
                <div class="col-sm-3 text-left follow-text">
                    <%t Home.Follow %>
                </div>
                <ul class="col-sm-9 no-padding">
                    <li><a href="" class="icons"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="" class="icons"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="" class="icons"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="" class="icons"><i class="fa fa-weibo"></i></a></li>
                    <li><a href="" class="icons"><i class="fa fa-wechat"></i></a></li>
                    <li><a href="" class="icons"><i class="fa fa-tencent-weibo"></i></a></li>
                </ul>
            </div>
            <ul class="col-xs-3 languages">
                <% loop $Languages %>
                    <li>
                        <a href="{$Top.Link}/lang/{$code}">$title</a>
                    </li>
                <% end_loop %>
            </ul>
        </div>
    </div>
        <!--
    <div class="information">
        <div class="container">
            Here is the social information
        </div>
    </div>
        -->
    <div class="copyright">
        <div class="container">
            <div class="col-sm-12 text-center">
                <%t Common.CreatedBy %> <a target="_blank" href="http://3awebsites.co.nz/">3A Web Solution</a>
            </div>
        </div>
    </div>
</footer>