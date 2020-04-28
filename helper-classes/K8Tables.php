<?php
    class K8Tables {
        const EMAIL_SERVICE_TAX_ID = 2;
        const PASS_MANAGER_TAX_ID = 3;
        const CLOUD_SERVICE_TAX_ID = 4;
        const MESSENGER_TAX_ID = 5;
        const ANTIVIRUS_TAX_ID = 6;
        const PROJECT_MANAGER_TAX_ID = 30;

        static $pms_fields = [
            'boolean' =>['k8_cmn_free', 'k8_pms_web_version', 'k8_pms_audio', 'k8_pms_video', 'k8_pms_chat'],
            'group' => ['k8_pms_desktop_app', 'k8_pms_mobile_app', 'k8_pms_sec_measures'],
            'text' => ['k8_cmn_lang','k8_pms_att', 'vk8_pms_srok']
        ];

        static $messenger_fields = [
            'boolean' => ['k8_cmn_free', 'k8_msg_audio', 'k8_msg_video', 'k8_msg_konf', 'k8_msg_secret', 'k8_msg_web'],
            'group' => ['k8_msg_desk', 'k8_msg_mob', 'k8_msg_alg', 'k8_msg_prot'],
            'text' => ['k8_cmn_lang', 'k8_msg_att']
        ];

        static $pass_manager_fields = [
            'boolean' => ['k8_cmn_free', 'k8_pass_tip_loc', 'k8_pass_tip_cld', 'k8_pass_plug', 'k8_pass_integr'],
            'group' => ['k8_pass_desk', 'k8_pass_mob', 'k8_pass_alg',],
            'text' => ['k8_cmn_lang', 'k8_pass_val']
        ];

        static $antivirus_fields = [
            'boolean' => ['k8_cmn_free', 'k8_vir_game'],
            'long_boolean' => ['k8_vir_abill', 'k8_vir_auto', 'k8_vir_ext'],
            'group' => ['k8_vir_os', 'k8_vir_mob'],
            'text' => ['k8_cmn_lang', 'k8_vir_srok']
        ];
        static $cloud_services_fields = [
            'boolean' => ['k8_cmn_free'],
            'long_boolean' => ['k8_cld_integr'],
            'group' => ['k8_cld_dsc', 'k8_cld_app', 'k8_cld_alg', 'k8_cld_add'],
            'text' => ['k8_cmn_lang', 'k8_cld_vol']
        ];

        static $email_fields = [
            'boolean' => ['k8_cmn_free', 'k8_eml_out', 'k8_eml_thun', 'k8_eml_bat', 'k8_eml_pop', 'k8_eml_imap', 'k8_eml_smtp','k8_eml_ssl','k8_eml_tls'],
            'group' => ['k8_eml_own_domain', 'k8_eml_osapp','k8_eml_mery'],
            'text' => ['k8_cmn_lang', 'k8_eml_vol','k8_eml_att','k8_eml_tim']
        ];


    static function getFields($taxonomy_id, $type) {
        switch($taxonomy_id) {
            case self::PROJECT_MANAGER_TAX_ID: 
                return self::$pms_fields[$type];
            break;
            case self::MESSENGER_TAX_ID: 
                return self::$messenger_fields[$type];
            break;
            case self::PASS_MANAGER_TAX_ID: 
                return self::$pass_manager_fields[$type];
            break;
            case self::ANTIVIRUS_TAX_ID: 
                return self::$antivirus_fields[$type];
            break;
            case self::CLOUD_SERVICE_TAX_ID:
                return self::$cloud_services_fields[$type];
            break;
            case self::EMAIL_SERVICE_TAX_ID:
                return self::$email_fields[$type];
            break;
            default:
                return false;
        }
    }

    
    static function printBooleanTable($post_id) {
        global $post_id;
        $post_terms= get_the_terms($post_id,'k8tax_group');
        $tax_id = $post_terms[0]->term_id;

        if($fields = self::getFields($tax_id, 'boolean')) {

            $table_data = [];

            foreach($fields as $field) {
                $field = get_field_object($field, $post_id);
                $table_data[$field['label']] = $field['value'];
            }

            include __DIR__ . '/templates/boolean-table.php';
        }
    }


    static function printTariffTable() {
        include __DIR__ . '/templates/tariff-table.php';
    }


    static function printTextTable() {
        global $post_id;
        $post_terms= get_the_terms($post_id,'k8tax_group');
        $tax_id = $post_terms[0]->term_id;

        $group_fields = self::getFields($tax_id, 'group');
        $text_fields = self::getFields($tax_id, 'text');
        $long_bool_fields = self::getFields($tax_id, 'long_boolean');
        $table_data = [];

        foreach($group_fields as $field) {
            $field = get_field_object($field, $post_id);
            $value = implode(', ' , array_column($field['value'], 'label'));
            if(empty($value)) continue;
            $table_data[$field['label']] = $value;
        }

        foreach($text_fields as $field) {
            $field = get_field_object($field, $post_id);
            if(empty($field['value'])) continue;
            $table_data[$field['label']] = $field['value'];
        }

        if(is_array($long_bool_fields)) {
            foreach($long_bool_fields as $field) {
                $field = get_field_object($field, $post_id);
                $value = $field['value'] ? 'fa-check' : 'fa-times';
                $table_data[$field['label']] = '<i class="fas '. $value .'"></i>';
            }
        }

        include __DIR__ . '/templates/text-table.php';
    }

}