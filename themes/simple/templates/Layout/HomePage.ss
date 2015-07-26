<div class="row content">
    <div class="block col-xs-12 col-sm-5 col-sm-offset-1">
        <div class="calc-form">
            $CalcForm
        </div>
    </div>
    <div class="block news col-xs-12 col-sm-4 col-sm-offset-1">
        <div class="title col-sm-12">
            <%t Home.NewsTitle %>
        </div>
        <ul class="summaries col-sm-12">
            <% loop $ArticleSummaries %>
                <a href="$Link">
                    <li class="col-sm-12 no-padding">
                        <h4 class="col-sm-12 no-padding ellipsis">
                            <div class="col-sm-7 no-padding ellipsis">$Title</div>
                            <div class="col-sm-5 no-padding text-right">$Date</div>
                        </h4>
                        <div class="ellipsis col-sm-12 no-padding">
                            $Content.summary(12)
                        </div>
                    </li>
                </a>
            <% end_loop %>
        </ul>
    </div>
</div>