<div class="row content">
    <div class="col-sm-12 block">
        <div class="col-xs-12 col-sm-6">
            <div class="col-sm-12 gallery text-center">
                <% loop $LeftImages %>
                    <a href="$Filename" class="fancybox col-sm-12 col-xs-12" rel="gallery-left">
                        $setSize(512, 384)
                    </a>
                <% end_loop %>
                <a href="$LeftImages.First.Filename" class="fancybox col-sm-12" rel="group">
                    <h4><%t Products.ViewGallery %></h4>
                </a>
            </div>
            <div class="col-sm-12">
                $ContentLeft
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="col-sm-12 gallery text-center">
                <% loop $RightImages %>
                    <a href="$Filename" class="fancybox col-sm-12 col-xs-12" rel="gallery-right">
                        $setSize(512, 384)
                    </a>
                <% end_loop %>
                <a href="$RightImages.First.Filename" class="fancybox col-sm-12" rel="group">
                    <h4><%t Products.ViewGallery %></h4>
                </a>
            </div>
            <div class="col-sm-12">
                $ContentRight
            </div>
        </div>
    </div>
</div>

