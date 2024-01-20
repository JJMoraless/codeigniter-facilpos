<div class="container mt-5 ">
    <!--  FORM -->
    <?php echo form_open('', 'class="my_form" enctype="multipart/form-data"') ?>
    <div class="container row">
        <!--  INPUT -->
        <div class="form-group col-md-5 ">
            <?php
            echo form_label('title', 'title');
            echo form_input([
                'name' => 'title',
                'id' => 'title',
                'value' => '',
                'class' => 'form-control',
                'placeholder' => 'Title',
                'type' => 'text'

            ]);
            echo form_error('title', '<div class="text-danger">', '</div>');
            ?>
        </div>

        <!--  INPUT -->
        <div class="form-group col-md-5 ">
            <?php
            echo form_label('url_clean', 'url_clean');
            echo form_input([
                'name' => 'url_clean',
                'id' => 'url_clean',
                'value' => '',
                'class' => 'form-control input-lg',
                'type' => 'text'
            ]);
            echo form_error('url_clean', '<div class="text-danger">', '</div>');
            ?>
        </div>

        <!--  INPUT -->
        <div class="form-group col-md-5 ">
            <?php
            echo form_label('content', 'content');
            echo form_textarea([
                'name' => 'content',
                'id' => 'content',
                'value' => '',
                'class' => 'form-control input-lg'
            ]);
            echo form_error('content', '<div class="text-danger">', '</div>');
            ?>
        </div>

        <!--  INPUT -->
        <div class="form-group col-md-5 ">
            <?php
            echo form_label('description', 'description');
            echo form_input([
                'name' => 'description',
                'id' => 'description',
                'value' => '',
                'class' => 'form-control input-lg',
                'type' => 'text'
            ]);
            echo form_error('description', '<div class="text-danger">', '</div>');
            ?>
        </div>

        <!--  INPUT -->
        <div class="form-group col-md-5 ">
            <?php
            echo form_label('image', 'image');
            echo form_input([
                'name' => 'image',
                'id' => 'image',
                'value' => '',
                'type' => 'file',
                'class' => 'form-control input-lg'
            ]);
            echo form_error('image', '<div class="text-danger">', '</div>');
            ?>
        </div>

        <!--  INPUT -->
        <div class="form-group col-md-5 ">
            <?php
            echo form_label('posted', 'posted');
            // name, options, selected, attributes. data_posted is an array that comes from the controller
            echo form_dropdown('posted', $data_posted, null, 'class="form-control input-lg"');
            echo form_error('posted', '<div class="text-danger">', '</div>');
            ?>
        </div>
    </div>

    <div class="container mt-2 ">
        <?php
        echo form_button([
            'type' => 'submit',
            'content' => 'Save',
            'class' => 'btn btn-primary'
        ]);
        ?>
    </div>

    <?php echo form_close() ?>
</div>