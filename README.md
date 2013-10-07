# CodeIgniter CSV Reader / Parser #

Inspired by [Raheel Shan's](http://stackoverflow.com/users/713141/raheel-shan "Raheel Shan's") code from http://stackoverflow.com/questions/11337221/codeigniter-rest-csv-import-to-mysql

### Usage: ###
Put the file to application/library

Controller:

    function readExcel()
    {
        $this->load->library('csvreader');
        $result = $this->csvreader->parse_file('Test.csv');//path to csv file
    
        $data['csvData'] =  $result;
        $this->load->view('view_csv', $data);  
    }

View:

    <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
                <td width = "10%">ID</td>
                <td width = "20%">NAME</td>
                <td width = "20%">SHORT DESCRIPTION</td>
                <td width = "30%">LONG DESCRIPTION</td>
                <td width = "10%">STATUS</td>
                <td width = "10%">PARENTID</td>
        </tr>

                <?php foreach($csvData as $field){?>
                    <tr>
                        <td><?php echo $field['id']?></td>
                        <td><?php echo $field['name']?></td>
                        <td><?php echo $field['shortdesc']?></td>
                        <td><?php echo $field['longdesc']?></td>
                        <td><?php echo $field['status']?></td>
                        <td><?php echo $field['parentid']?></td>
                    </tr>
                <?php }?>
    </table>