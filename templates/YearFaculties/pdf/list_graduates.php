<style>
    .main {
        font-family: "Times New Roman";
        padding: 20px 40px 160px;
    }

    table {
        width: 100%;
    }

    table, th, td {
        padding: 5px;
        border: 1px solid;
        border-collapse: collapse;
    }
</style>

<div class="main">
    <h1><?= $yearFaculty->faculty->title ?></h1>
    <h2><?= __('Release year: {0}', $yearFaculty->release_year->year) ?></h2>
    <table>
        <thead>
            <tr>
                <th style="text-align: center; width: 5%"><?= __('Number') ?></th>
                <th style="text-align: left; width: 40%"><?= __('Full Name En') ?></th>
                <th style="text-align: left; width: 40%"><?= __('Full Name Uz') ?></th>
                <th style="text-align: center;"><?= __('Excellent') ?></th>
                <th style="text-align: center;"><?= __('Verified') ?></th>
            </tr>
        </thead>
        <?php foreach($yearFaculty->study_groups as $studyGroup): ?>
            <?php foreach ($studyGroup->graduates as $graduate) : ?>
            <tbody>
                <tr>
                    <td style="text-align: center;"><?= h($graduate->number) ?></td>
                    <td><?= h($graduate->full_name_en) ?></td>
                    <td><?= h($graduate->full_name_uz) ?></td>
                    <td style="text-align: center;"><?= $graduate->excellent ? __('Yes') : '' ?></td>
                    <td style="text-align: center;"><?= $graduate->verified ? __('Yes') : __('No') ?></td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</div>
