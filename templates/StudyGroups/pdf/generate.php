<style>
.page {
    position: relative;
    page-break-after: always;
    margin: 0;
    padding: 0;
    width: 100%;
    height: 37.1cm;
    overflow: hidden;
}
</style>


<?php foreach($studyGroup->graduates as $graduate): ?>
<table class="page" cellspacing="0" cellpadding="0">
    <tr>
        <td style="background-color: #ceb570; width: 22%; vertical-align: top; text-align: center;">
            <div style="padding-top: 15mm;">
                <img src="<?= WWW_ROOT ?>img/logo.png" width="90" />
            </div>
        </td>
        <td style="width: 78%; vertical-align: top;">
            <div style="padding: 12mm; padding-top: 20mm; font-weight: 700; font-size: 25px;">
                <div style="color: red; margin-bottom: 40mm;"><?= $graduate->num ?></div>
                <div style="text-align: center; margin-bottom: 35mm;">
                    <div style="text-transform: uppercase; font-size: 35px; margin-bottom: 15mm;">BUCHEON UNIVERSITY IN TASHKENT</div>
                    <div style="margin-bottom: 15mm;">has conferred upon</div>
                    <div style="text-transform: uppercase; font-size: 32px; margin-bottom: 20mm;"><?= $graduate->full_name_en ?></div>
                    
                    <div style="margin-bottom: 5mm;">the Degree of</div>
                    <div style="font-size: 30px; margin-bottom: 3mm;"><?= $studyGroup->year_faculty->faculty->title_print_en ?></div>

                    <?php if ($graduate->excellent): ?>
                    <div style="color: red; margin-bottom: 15mm;">with honors</div>
                    <?php else: ?>
                    <div style="margin-bottom: 12mm;"></div>
                    <?php endif; ?>

                    <div style="font-size: 21px;">
                        <?= $studyGroup->year_faculty->release_year->date_en ?>
                    </div>
                </div>

                <table style="width: 100%; font-size: 24px; margin-bottom: 40mm;">
                    <tr>
                        <td style="width: 50%;">Rector</td>
                        <td style="text-align: right">Viktor V. Nam, DSc.</td>
                    </tr>
                </table>

                <div style="font-size: 22px;"><?= "Reg.No: BUT {$studyGroup->year_faculty->release_year->year}-{$graduate->number}" ?></div>
            </div>
            
        </td>
    </tr>
</table>
<div class="new-page"></div>

<table class="page" cellspacing="0" cellpadding="0">
    <tr>
        <td style="background-color: #ceb570; width: 22%; vertical-align: top; text-align: center;">
            <div style="padding-top: 15mm;">
                <img src="<?= WWW_ROOT ?>img/logo.png" width="90" />
            </div>
        </td>
        <td style="width: 78%; vertical-align: top;">
            <div style="padding: 12mm; padding-top: 20mm; font-weight: 700; font-size: 25px;">
                <div style="color: red; margin-bottom: 30mm;"><?= $graduate->num ?></div>
                <div style="text-align: center; margin-bottom: 35mm;">
                    <div style="text-transform: uppercase; font-size: 35px; margin-bottom: 20mm;">TOSHKENT SHAHRIDAGI PUCHON UNIVERSITETI</div>
                    <div style="text-transform: uppercase; font-size: 32px; margin-bottom: 20mm;"><?= $graduate->full_name_uz ?></div>
                    <div style="text-transform: uppercase; margin-bottom: 15mm; font-size: 20px;">BELGILANGAN TALABLARNI TO’LIQ BAJARGANLIGI TASDIQLANDI HAMDA UNGA</div>
                    
                    <div style="font-size: 29px; margin-bottom: 3mm;"><?= $studyGroup->year_faculty->faculty->title_print_uz ?></div>
                    <div style="text-transform: uppercase; margin-bottom: 15mm;">YO’NALISHI BO’YICHA</div>

                    <?php if ($graduate->excellent): ?>
                    <div style="text-transform: uppercase; color: red; margin-bottom: 3mm;">IMTIYOZLI</div>
                    <?php endif; ?>

                    <div style="text-transform: uppercase; margin-bottom: 1mm; font-size: 30px;">BAKALAVR</div>
                    <div style="text-transform: uppercase; margin-bottom: 15mm;">DARAJASI BERILDI</div>

                    <div style="font-size: 21px; margin-bottom: 30mm;">
                        <?= $studyGroup->year_faculty->release_year->date_uz ?>
                    </div>
                </div>

                <table style="width: 100%; font-size: 24px; margin-bottom: 40mm;">
                    <tr>
                        <td style="width: 50%;">Rector</td>
                        <td style="text-align: right">Viktor V. Nam, DSc.</td>
                    </tr>
                </table>

                <div style="font-size: 22px;"><?= "Reg.No: BUT {$studyGroup->year_faculty->release_year->year}-{$graduate->number}" ?></div>
            </div>
            
        </td>
    </tr>
</table>
<div class="new-page"></div>

<?php endforeach; ?>