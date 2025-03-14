<div>
    <h2 class="text-center">Map</h2>
    <div id="map-container">
        @foreach($grid as $row)
            <div class="row">
                @foreach($row as $cell)
                    <div class="cell"></div>
                @endforeach
            </div>
        @endforeach    
    </div>
</div>
