<?php
namespace App\Libraries;

include APPPATH . "ThirdParty/fpdf/fpdf.php";

class PDF extends FPDF
{
// Load data
    public function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach ($lines as $line) {
            $data[] = explode(';', trim($line));
        }
        return $data;
    }

// Colored table
    public function FancyTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('', 'B');
        // Header
        $w = array(15, 55, 80, 40);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 8, $header[$i], 'B', 0, 'L');
        }

        $this->Ln();
        // Color and font restoration
        $this->SetDrawColor(255);
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        $count = 1;
        foreach ($data as $row) {
            $this->Cell($w[0], 8, $count, 'B', 0, 'L', $fill);
            $this->Cell($w[1], 8, $row['first_name'] . " " . $row['last_name'], 'B', 0, 'L', $fill);
            $this->Cell($w[2], 8, $row['email'], 'B', 0, 'L', $fill);
            $this->Cell($w[3], 8, $row['mobile'], 'B', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
            $count++;
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}