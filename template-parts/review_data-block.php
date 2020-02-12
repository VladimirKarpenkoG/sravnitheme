<div class="article__info">
    <div class="row gutter-lg">
        <div class="col-12 col-lg-8">
            <?= K8Tables::printTextTable();?>
            </div>
            <div class="col-12 col-lg-4">
              <div class="row gutter-lg">
                  <?= K8Tables::printTariffTable();?>
                <!-- Mail block -->
                <div class="col-12 col-sm-6 col-lg-12">
                  <?= K8Tables::printBooleanTable(get_the_ID());?>
                </div>
            <!-- END MAIL BLOCK -->
            </div>
        </div>
    </div>
</div>