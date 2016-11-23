<?php
$config = array(

    'login/index'=>array(
        array(
            'field' => 'username',
            'label' => 'User Name',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|callback_check_user'
            )
    ),

    'category/addCategory' => array(
            array(
            'field' => 'category',
            'label' => 'Category',
//            'rules' => 'trim|required|callback_check_category'
            'rules' => 'trim|required|is_unique[category.category]'
            )
//            array(
//            'field' => 'userfile',
//            'label' => 'Category Image',
//            'rules' => 'trim|required|callback_handle_upload'
//            )
        ),

    'category/editCategory' => array(
            array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'trim|required'
            )
        ),
        
    'subcategory/addSubcategory'=>array(
            array(
            'field' => 'selectCategory',
            'label' => 'Category',
            'rules' => 'trim|required'
            ),
             array(
            'field' => 'subcat',
            'label' => 'Sub Category',
            //'rules' => 'trim|required|callback_check_subcategory'
            'rules' => 'trim|required'
            )
        ),

        'subcategory/editSubcategory'=>array(
             array(
            'field' => 'subcat',
            'label' => 'Sub Category',
            'rules' => 'trim|required'
            )
        ),

        //classified section

        'classifiedcategory/addClassifiedCategory' => array(
            array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'trim|required|is_unique[classified_category.category]'
            )
        ),

        'classifiedcategory/editClassifiedCategory' => array(
            array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'trim|required'
            )
        ),

        'classifiedsubcategory/addClassifiedSubcategory'=>array(
            array(
            'field' => 'selectCategory',
            'label' => 'Category',
            'rules' => 'trim|required'
            ),
             array(
            'field' => 'subcat',
            'label' => 'Sub Category',
            'rules' => 'trim|required'
            )
        ),

        'classifiedsubcategory/editClassifiedSubcategory'=>array(
             array(
            'field' => 'subcat',
            'label' => 'Sub Category',
            'rules' => 'trim|required'
            )
        ),

        //deal section

        'deals/addDeal' => array(
            array(
            'field' => 'title',
            'label' => 'Deal Title',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'start_date',
            'label' => 'Start Date',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'end_date',
            'label' => 'End Date',
            'rules' => 'trim|required'
            )
        ),

        'deals/editDeal' => array(
            array(
            'field' => 'title',
            'label' => 'Deal Title',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'start_date',
            'label' => 'Start Date',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'end_date',
            'label' => 'End Date',
            'rules' => 'trim|required'
            )
        ),

        // district section
        'districts/addDistricts' => array(
            array(
            'field' => 'district',
            'label' => 'District',
            'rules' => 'trim|required|is_unique[districts.district]'
            )
        ),

        'districts/editDistricts' => array(
            array(
            'field' => 'district',
            'label' => 'District',
            'rules' => 'trim|required'
            )
        ),

        // area section
        'area/addArea' => array(
            array(
            'field' => 'selectDis',
            'label' => 'District',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'area',
            'label' => 'Area',
            'rules' => 'trim|required|is_unique[area.area]'
            )
        ),

        'area/editArea' => array(
            array(
            'field' => 'area',
            'label' => 'Area',
            'rules' => 'trim|required'
            )
        ),

        // profile section
        'profile/addProfile' => array(
            array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'user_name',
            'label' => 'User_Name',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'user_password',
            'label' => 'User Password',
            'rules' => 'trim|required'
            )
        ),

         // user section
        'users/addUser' => array(
            array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'user_name',
            'label' => 'User Name',
            'rules' => 'trim|required|is_unique[user.user_name]'
            ),
            array(
            'field' => 'user_password',
            'label' => 'User Password',
            'rules' => 'trim|required'
            )
        ),
        
        'users/editUser' => array(
            array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'user_name',
            'label' => 'User Name',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'user_password',
            'label' => 'User Password',
            'rules' => 'trim|required'
            )
        ),

        //ads section
        'ads/addAd' => array(
            array(
            'field' => 'title',
            'label' => 'Ad Title',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectCategory',
            'label' => 'Category',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectSubCategory',
            'label' => 'Sub Category',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectDis',
            'label' => 'District',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectArea',
            'label' => 'Area',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'customer',
            'label' => 'Customer Name',
            'rules' => 'trim|required'
            ),
//            array(
//            'field' => 'address',
//            'label' => 'Customer Address',
//            'rules' => 'trim|required'
//            ),
            array(
            'field' => 'phone',
            'label' => 'Customer Phone No',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'email',
            'label' => 'Customer Email',
            'rules' => 'trim|required|valid_email'
            ),
            array(
            'field' => 'selectType',
            'label' => 'Ad Type',
            'rules' => 'trim|required'
            )
//            array(
//            'field' => 'selectCat',
//            'label' => 'Ad Category',
//            'rules' => 'trim|required'
//            )
        ),

        'ads/editAd' => array(
            array(
            'field' => 'title',
            'label' => 'Ad Title',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectCategory',
            'label' => 'Category',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectSubCategory',
            'label' => 'Sub Category',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectDis',
            'label' => 'District',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectArea',
            'label' => 'Area',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'customer',
            'label' => 'Customer Name',
            'rules' => 'trim|required'
            ),
//            array(
//            'field' => 'address',
//            'label' => 'Customer Address',
//            'rules' => 'trim|required'
//            ),
            array(
            'field' => 'phone',
            'label' => 'Customer Phone No',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'email',
            'label' => 'Customer Email',
            'rules' => 'trim|required|valid_email'
            ),
            array(
            'field' => 'selectType',
            'label' => 'Ad Type',
            'rules' => 'trim|required'
            )
//            array(
//            'field' => 'selectCat',
//            'label' => 'Ad Category',
//            'rules' => 'trim|required'
//            )
        ),

        // page section
        'pages/addPages' => array(
//        array(
//            'field' => 'aboutus',
//            'label' => 'About us',
//            'rules' => 'trim|required|xss_clean'
//            ),
            array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|valid_email'
            ),
            array(
            'field' => 'phone',
            'label' => 'Phone No',
            'rules' => 'trim|numeric'
            )
        ),

        //classified ads section
        'classifiedads/addAd' => array(
            array(
            'field' => 'title',
            'label' => 'Ad Title',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectCategory',
            'label' => 'Category',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectSubCategory',
            'label' => 'Sub Category',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectDis',
            'label' => 'District',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectArea',
            'label' => 'Area',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'customer',
            'label' => 'Customer Name',
            'rules' => 'trim|required'
            ),
//            array(
//            'field' => 'address',
//            'label' => 'Customer Address',
//            'rules' => 'trim|required'
//            ),
            array(
            'field' => 'phone',
            'label' => 'Customer Phone No',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'email',
            'label' => 'Customer Email',
            'rules' => 'trim|required|valid_email'
            ),
            array(
            'field' => 'selectType',
            'label' => 'Ad Type',
            'rules' => 'trim|required'
            )
//            array(
//            'field' => 'selectCat',
//            'label' => 'Ad Category',
//            'rules' => 'trim|required'
//            )
        ),

        'classifiedads/editAd' => array(
            array(
            'field' => 'title',
            'label' => 'Ad Title',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectCategory',
            'label' => 'Category',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectSubCategory',
            'label' => 'Sub Category',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectDis',
            'label' => 'District',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'selectArea',
            'label' => 'Area',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|required'
            ),
            array(
            'field' => 'customer',
            'label' => 'Customer Name',
            'rules' => 'trim|required'
            ),
//            array(
//            'field' => 'address',
//            'label' => 'Customer Address',
//            'rules' => 'trim|required'
//            ),
            array(
            'field' => 'phone',
            'label' => 'Customer Phone No',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'email',
            'label' => 'Customer Email',
            'rules' => 'trim|required|valid_email'
            ),
            array(
            'field' => 'selectType',
            'label' => 'Ad Type',
            'rules' => 'trim|required'
            )
        )

//        'webdetails/postAd' => array(
//            array(
//            'field' => 'title',
//            'label' => 'Ad Title',
//            'rules' => 'trim|required'
//            ),
//            array(
//            'field' => 'selectCategory',
//            'label' => 'Category',
//            'rules' => 'trim|required'
//            ),
//            array(
//            'field' => 'selectSubCategory',
//            'label' => 'Sub Category',
//            'rules' => 'trim|required'
//            ),
//            array(
//            'field' => 'selectDis',
//            'label' => 'District',
//            'rules' => 'trim|required'
//            ),
//            array(
//            'field' => 'selectArea',
//            'label' => 'Area',
//            'rules' => 'trim|required'
//            ),
//            array(
//            'field' => 'description',
//            'label' => 'Description',
//            'rules' => 'trim|required'
//            ),
//            array(
//            'field' => 'customer',
//            'label' => 'Customer Name',
//            'rules' => 'trim|required'
//            ),
//            array(
//            'field' => 'address',
//            'label' => 'Customer Address',
//            'rules' => 'trim|required'
//            ),
//            array(
//            'field' => 'phone',
//            'label' => 'Customer Phone No',
//            'rules' => 'trim|required|numeric'
//            ),
//            array(
//            'field' => 'email',
//            'label' => 'Customer Email',
//            'rules' => 'trim|required|valid_email'
//            ),
//            array(
//            'field' => 'selectType',
//            'label' => 'Ad Type',
//            'rules' => 'trim|required'
//            )
//        )

        //contact seller
//        'webdetails/contactSeller'=>array(
//        array(
//            'field' => 'name',
//            'label' => 'Name',
//            'rules' => 'trim|required'
//            ),
//            array(
//            'field' => 'email',
//            'label' => 'Email',
//            'rules' => 'trim|required'
//            ),
//            array(
//            'field' => 'phone',
//            'label' => 'Phone No',
//            'rules' => 'trim|required'
//            ),
//            array(
//            'field' => 'message',
//            'label' => 'Your Message',
//            'rules' => 'trim|required'
//            )
//    )
);
