<div class="row content">
    <div class="block col-xs-12 col-sm-10 col-sm-offset-1">
        <div class="col-sm-6 col-xs-12">
            $Content
        </div>
        <div class="col-sm-6 col-xs-12">
            <% loop $Images %>
                <div class="col-sm-12 img-container">
                    <img src="$Filename" class="img-responsive">
                </div>
            <% end_loop %>
        </div>
    </div>
</div>