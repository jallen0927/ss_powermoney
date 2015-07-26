<div class="row content">
    <div class="block col-xs-12 col-sm-10 col-sm-offset-1">
        <ul class="articles">
            <% loop $Children.Sort(Date, Desc) %>
                <li class="col-sm-12 no-padding">
                    <a href="$Link">
                        <h4 class="col-sm-12 no-padding">
                            <div class="col-sm-7 no-padding">$Title</div>
                            <div class="col-sm-5 no-padding text-right">$Date</div>
                        </h4>
                    </a>
                    <div class="ellipsis col-sm-12 no-padding">
                        $Content.summary(50)
                    </div>
                </li>
            <% end_loop %>
        </ul>
    </div>
</div>