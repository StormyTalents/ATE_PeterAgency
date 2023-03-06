<?php namespace App;

class Format {

    public static function dateInText($timestamp) {
        $months = [
            1 => 'januari',
            2 => 'februari',
            3 => 'mars',
            4 => 'april',
            5 => 'maj',
            6 => 'juni',
            7 => 'juli',
            8 => 'augusti',
            9 => 'september',
            10 => 'oktober',
            11 => 'november',
            12 => 'december',
        ];
        if(preg_match('/(?<y>\d{4})-(?<m>\d{2})-(?<d>\d{2})/i', $timestamp, $hit)) {
            return intval($hit['d']) . ' ' . $months[intval($hit['m'])] . ' ' . $hit['y'];
        }
        return '';
    }

    public static function interest($from, $to) {
        
        $ret = number_format($from,2,',',' ');
        if($to > $from) {
            $ret .= ' – ' . number_format($to,2,',',' ');
        }

        return $ret . ' %';
    }

    public static function amount($from, $to = 0) {
        
        $ret = number_format($from,0,',',' ');
        if($to > $from) {
            $ret .= ' – ' . number_format($to,0,',',' ');
        }

        return $ret . ' kr';
    }

    public static function percent($from, $to = 0) {
        
        $ret = number_format($from,0,',',' ');
        if($to > $from) {
            $ret .= ' – ' . number_format($to,0,',',' ');
        }

        return $ret . ' %';
    }

    public static function prettyTime($days_from, $days_to) {
        $unit_from = 'dgr';
        $unit_to = 'dgr';
        if($days_from >= 30 && $days_from < 365) {
            $unit_from = 'mån';
        } else if($days_from >= 365){
            $unit_from = 'år';
        }
        if($days_to >= 30 && $days_to < 365) {
            $unit_to= 'mån';
        } else if($days_to >= 365) {
            $unit_to = 'år';
        }

        $from = $days_from;
        $to = $days_to;

        if($unit_from == 'mån') {
            if(abs(abs(round($from/30) - $from/30) - 0.5) < 0.05) {
                $from = number_format($from/30, 1, ',',' ');
            } else {
                $from = round($from / 30);
            }
        } else if($unit_from == 'år') {
            if(abs(abs(round($from/365) - $from/365) - 0.5) < 0.05) {
                $from = number_format($from/365, 1, ',',' ');
            } else {
                $from = round($from / 365);
            }
        }

        if($unit_to == 'mån') {
            if(abs(abs(round($to/30) - $to/30) - 0.5) < 0.05) {
                $to = number_format($to/30, 1, ',',' ');
            } else {
                $to = round($to / 30);
            }
        } else if($unit_to == 'år') {
            if(abs(abs(round($to/365) - $to/365) - 0.5) < 0.05) {
                $to = number_format($to/365, 1, ',',' ');
            } else {
                $to = round($to / 365);
            }
        }

        $return = '';
        if($from > 0 && ($unit_from != $unit_to || $from != $to)) {
            $return .= $from . ($unit_from != $unit_to ? (' ' . $unit_from) : '');
        }

        if($from > 0 && $to > 0 && ($unit_from != $unit_to || $from != $to)) {
            $return .= ' – ';
        }

        if($to > 0) {
            $return .= $to . ' ' . $unit_to;
        }

        return $return;

    }

}