<div class="modalHeader">Album Uploader</div>

<div class="modalBody center mCustomScrollbar">
    <div class="col-row">
        <div class="col-left">
            <input type="text" placeholder="Album Title" title="AlbumTitle" class="full-wide"
                   id="metaDataAlbumTitle"/>
        </div>
        <div class="col-right">
            <input type="text" placeholder="Main Artist" title="AlbumArtist" class="full-wide"
                   id="metaDataAlbumArtist"/>
        </div>
    </div>

    <div>
        <hr/>
        <table class="cooltable">
            <thead>
            <tr>
                <th>#</th>
                <th style="min-width: 337px;">Title</th>
                <th>Artist(s)</th>
            </tr>
            </thead>
            <tbody id="metaDataSongsTableBody"></tbody>
        </table>
    </div>
</div>

<div class="modalFooter">
    <button id="btnBack">Back</button>
    <button id="btnCancel">Cancel</button>
    <button class="right" id="btnNext">Next</button>
</div>

<?php
require_once '../../../vendor/autoload.php';
use Lib\ICanHaz;

ICanHaz::js('2-Metadata.js', false, true);
?>