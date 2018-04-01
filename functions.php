<?php
    function queryFilter($query)
    {
        $queryAddition = '';

        foreach($query as $key => $value){
            if($key == 'brand' OR $key == 'model' OR $key == 'color'){
                $queryAddition .= ' AND c.'.$key.'="'.$value.'"';
            }
            if($key == 'reg_num' AND $value != '')
            {
                $queryAddition .= ' AND c.'.$key.' LIKE "%'.$value.'%"';
            }
            if($key == 'horse_powers'){
                switch($value){
                    case '1': {
                        $queryAddition .= ' AND c.'.$key.' BETWEEN "0" AND "100"';
                    }
                    break;
                    case '2': {
                        $queryAddition .= ' AND c.'.$key.' BETWEEN "100" AND "200"';
                    }
                    break;
                    case '3': {
                        $queryAddition .= ' AND c.'.$key.' BETWEEN "200" AND "300"';
                    }
                    break;
                    case '4': {
                        $queryAddition .= ' AND c.'.$key.'>="300"';
                    }
                    break;
                }
            }
        }
        return $queryAddition;
    }

    function queryDates($query)
    {
        $queryAddition = '';
        $dateCount = 0;
        $from_date = '';
        $to_date = '';

        if(isset($query['type']) AND $query['type'] == 'allFreeCars'){
            foreach($query as $key => $value){
                if($key == 'from_date' AND $value != ''){
                    $from_date = str_replace('.', '-', $value);
                    $dateCount++;
                }
                if($key == 'to_date' AND $value != ''){
                    $to_date = str_replace('.', '-', $value);
                    $dateCount++;
                }
            }
            if($dateCount == 2) {
                $queryAddition .= 'cc.return_date < CAST("'.$from_date.'" AS DATE) OR cc.rent_date > CAST("'.$to_date.'" AS DATE)';
            }else if($dateCount != 2){
                $queryAddition .= '1';
            }
        }
        if(isset($query['type']) AND $query['type'] == 'allRentedCars'){
            foreach($query as $key => $value){
                if($key == 'from_date' AND $value != ''){
                    $from_date = str_replace('.', '-', $value);
                    $dateCount++;
                }
                if($key == 'to_date' AND $value != ''){
                    $to_date = str_replace('.', '-', $value);
                    $dateCount++;
                } 
            }
            if($dateCount == 2) {
                $queryAddition .= 'cc.rent_date BETWEEN "'.$from_date.'" AND "'.$to_date.'"
                        AND cc.return_date BETWEEN "'.$from_date.'" AND "'.$to_date.'"';
            }else if($dateCount != 2){
                $queryAddition .= '1';
            }
        }
        return $queryAddition;
    }

    function getResults($queryType = null)
    {
        global $mysqli;
        if($queryType == null){
            $queryType['type'] = 'none';
        }
        switch($queryType['type'])
        {
            case 'allFreeCars': 
                {
                    $query = 'SELECT DISTINCT * FROM cars AS c 
                        LEFT OUTER JOIN clients_cars AS cc
                        ON c.id = cc.cars_id
                        WHERE '. queryDates($queryType) . queryFilter($queryType);
                    if(($result = $mysqli->query($query)) !== FALSE)
                    {
                        print '<table align="center">';
                        print '<tr><td>Make</td><td>Model</td><td>Reg.Number</td><td>Power</td><td>Color</td></tr>';
                        while ($row = $result->fetch_assoc())
                        {

                            print "<tr>";
                            printf("<td>%s</td>", $row['brand']);
                            printf("<td>%s</td>", $row['model']);
                            printf("<td>%s</td>", $row['reg_num']);
                            printf("<td>%s</td>", $row['horse_powers']);
                            printf("<td>%s</td>", $row['color']);
                            print "</tr>";					
                        }
                        print "</table>";

                        
                    }
                    else {
                        print "No matches found! <br />";
                    }

                    return null;
                }
                break;
            case 'allRentedCars': 
                {
                    $query = "SELECT c.*, cl.* FROM cars AS c
                        INNER JOIN clients_cars AS cc
                        on c.id = cc.cars_id
                        INNER JOIN clients as cl
                        on cl.id = cc.clients_id
                        WHERE " . queryDates($queryType) . queryFilter($queryType);

                    if(($result = $mysqli->query($query)) !== FALSE)
                    {
                        print '<table align="center">';
                        print '<tr><td>Make</td><td>Model</td><td>Reg.Number</td><td>Power</td><td>Color</td><td>First Name</td><td>Last Name</td><td>Age</td><td>License Category</td></tr>';
                        while ($row = $result->fetch_assoc())
                        {
                            print "<tr>";
                            printf("<td>%s</td>", $row['brand']);
                            printf("<td>%s</td>", $row['model']);
                            printf("<td>%s</td>", $row['reg_num']);
                            printf("<td>%s</td>", $row['horse_powers']);
                            printf("<td>%s</td>", $row['color']);
                            printf("<td>%s</td>", $row['first_name']);
                            printf("<td>%s</td>", $row['last_name']);
                            printf("<td>%s</td>", $row['age']);
                            printf("<td>%s</td>", $row['license_category']);
                            print "</tr>";					
                        }
                        print "</table>";
                    }
                    else {
                        print "No matches found! <br />";
                    }

                    return null;
                }
                break;
            case 'none':
                {
                    print '<table align="center">';
                    print '<tr><td>Make</td><td>Model</td><td>Reg.Number</td><td>Power</td><td>Color</td></tr>';
                    print "</table>";

                    return;
                }
                break;
        }
        $mysqli->close();
    }

    function getColors()
    {
        global $mysqli;

        $query = "SELECT DISTINCT cars.color FROM cars";
        if(($result = $mysqli->query($query)) !== FALSE)
        {
            while ($row = $result->fetch_assoc())
            {   
                printf("<option>%s</option>", $row['color']);   
            }
        }
        
        return;
    }

    function getBrand()
    {
        global $mysqli;

        $query = "SELECT DISTINCT cars.brand FROM cars";
        if(($result = $mysqli->query($query)) !== FALSE)
        {
            while ($row = $result->fetch_assoc())
            {   
                printf("<option>%s</option>", $row['brand']);   
            }
        }
        
        return;
    }

    function getModel()
    {
        global $mysqli;

        $query = "SELECT DISTINCT cars.model, cars.brand FROM cars";
        if(($result = $mysqli->query($query)) !== FALSE)
        {
            while ($row = $result->fetch_assoc())
            {   
                printf('<option class="%s">%s</option>', $row['brand'], $row['model']);   
            }
        }
        
        return;
    }