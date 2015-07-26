<footer>
    <div class="social">
        <div class="container">
            <div class="col-xs-8">Here is the social links</div>
            <ul class="col-xs-4">
                <% loop $Languages %>
                    <li>
                        <a href="{$Top.Link}/lang/{$code}">$title</a>
                    </li>
                <% end_loop %>
            </ul>
        </div>
    </div>
    <div class="information">
        <div class="container">
            Here is the social information
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            Here is the copyright
        </div>
    </div>
</footer>