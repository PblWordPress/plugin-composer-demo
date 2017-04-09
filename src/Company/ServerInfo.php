<?php

namespace Company;

class ServerInfo {

    public function showInfo() {
        
        echo '<h1>' . __('Server info', 'pbl') . '</h1>';
        
        ServerInfo::__createTable([
            __('Parameter', 'pbl'),
            __('Value', 'pbl'),
            __('Expected value', 'pbl'),
        ]);
        
        ServerInfo::__addRow([
            __('PHP Version', 'pbl'),
            phpversion(),
            '8.9',
        ]);
        
        ServerInfo::__addRow([
            __('PHP max_execution_time','pbl'),
            ini_get('max_execution_time'),
            '2 days',
        ]);
        
        ServerInfo::__addRow([
            __('WordPress Version','pbl'),
            get_bloginfo('version'),
            '5.68',
        ]);
        
        global $wpdb;
        ServerInfo::__addRow([
            __('MySQL Version', 'pbl'),
            $wpdb->db_version(),
            '7.8',
        ]);
        
        $zipMethods[] = function_exists('exec') ? 'exec' : null;
        $zipMethods[] = class_exists('ZipArchive') ? 'ziparchive' : null;
        $zipMethods[] = class_exists('PclZip') ? 'pclzip' : null;
        ServerInfo::__addRow([
            __('Zip Methods', 'pbl'),
            implode(', ', array_filter($zipMethods)),
            'winrar',
        ]);
      
        ServerInfo::__closeTable();
        
        echo '<div class="message"><p>' . __("You'd better run this plugin on a toaster", 'pbl') . '</p></div>';
    }
    
    private function __createTable( $values ) {
        if (is_array($values)) {
             echo '<table class="serverinfo"><thead><tr>';
             foreach ($values as $value) {
                 echo '<th>' . $value . '</th>';
             }
             echo '</tr></thead><tbody>';
        }
    }
    
    private function __addRow( $values ) {
        if (is_array($values)) {
             echo '<tr>';
             for ($count = 0; $count < count($values); $count++) {
                 $cell = $count == 0 ? 'th' : 'td';
                 echo '<' . $cell . '>' . $values[$count] . '</' . $cell . '>';
             }
             echo '</tr>';
        }
    }
    
    private function __closeTable() {
        echo "</tbody></table>";
    }
}
