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


<?php
foreach($studyGroup->graduates as $graduate) {
    echo $this->element('diploma', compact('graduate', 'studyGroup'));
}
?>