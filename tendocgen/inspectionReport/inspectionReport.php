\documentclass[10pt,oneside,british]{scrbook}
\renewcommand{\rmdefault}{cmr}
\usepackage[scaled=0.92]{helvet}
\renewcommand{\familydefault}{\sfdefault}
\usepackage[T1]{fontenc}
\usepackage[utf8]{inputenc}
\usepackage[a4paper]{geometry}
\geometry{verbose,tmargin=2cm,bmargin=2.5cm,lmargin=2cm,rmargin=2cm}
\usepackage{fancyhdr}
\pagestyle{fancy}
\setcounter{secnumdepth}{3}
\setcounter{tocdepth}{3}
\usepackage{array}
\usepackage{longtable}
\usepackage{booktabs}
\usepackage{textcomp}
\usepackage{multirow}
\usepackage{amssymb}

\makeatletter

\providecommand{\tabularnewline}{\\}

\lhead{www.tendocgen.co.nz}

\makeatother

\usepackage{babel}
\begin{document}

\section*{PROPERTY INSPECTION REPORT}
\noindent \textbf{\large <?php echo $data['tenancyAddress']; ?>}{\large \par}
\begin{flushleft}
\textbf{\large Date of inspection: \enskip{}\rule{30pt}{0.6pt} / \rule{30pt}{0.6pt}
/ \rule{40pt}{0.6pt}}
\par\end{flushleft}

$\square$ Tenant was asked if there is any damage or maintenance
issues.
\vspace{10pt}

\begin{table}[ht]
\begin{tabular}{>{\raggedleft}m{3.5cm}>{\centering}p{360pt}}
 & \textbf{\textsc{\large Kitchen}}\tabularnewline

\addlinespace[5pt]
Floors & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Walls / Doors & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Electrical / Lights & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Windows & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Blinds / Curtains & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Sink / Benches & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Oven & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Cupboards & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\end{tabular}
\end{table}

\begin{table}[h]
\begin{tabular}{>{\raggedleft}m{3.5cm}>{\centering}p{360pt}}
 & \textbf{\textsc{\large Lounge}} \tabularnewline
\addlinespace[5pt]
Floors & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Walls / Doors & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Electrical / Lights & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Windows & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Blinds / Curtains & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\end{tabular}
\end{table}

<?php
for ($i = 0; $i < $data['numberOfBathrooms']; ++$i) {
    ?>
    \begin{table}[h]
    \begin{tabular}{>{\raggedleft}m{3.5cm}>{\centering}p{360pt}}
     & \textbf{\textsc{\large Bathroom <?php if($data['numberOfBathrooms'] > 1) echo intToString($i + 1); ?>}}\tabularnewline
    \addlinespace[5pt]
    Floors & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Walls / Doors & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Electrical / Lights & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Windows & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Blinds / Curtains & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Mirror / Cabinets & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule

    \addlinespace[5pt]
    Shower & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Bath & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Shower over bath & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Extractor fan & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Heat lamp & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Wash basin & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Toilet & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \end{tabular}
    \end{table}
    <?php
}

if ($data['hasLaundry']) {
    ?>
    \begin{table}[h]
    \begin{tabular}{>{\raggedleft}m{3.5cm}>{\centering}p{360pt}}
     & \textbf{\textsc{\large Laundry}}\tabularnewline
    \addlinespace[5pt]
    Floors & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Walls / Doors & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Electrical / Lights & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Windows & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \addlinespace[5pt]
    Blinds / Curtains & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    \end{tabular}
    \end{table}
    <?php
}

for ($i = 0; $i < $data['numberOfBedrooms']; ++$i) {
    ?>
    \begin{table}[h]
    \begin{tabular}{>{\raggedleft}m{3.5cm}>{\centering}p{360pt}}
     & \textbf{\textsc{\large Bedroom <?php if($data['numberOfBedrooms'] > 1) echo intToString($i + 1); ?>}}\tabularnewline
    \addlinespace[5pt]
    Floors & \tabularnewline
    \midrule
    \addlinespace[5pt]
    Walls / Doors & \tabularnewline
    \midrule
    \addlinespace[5pt]
    Electrical / Lights & \tabularnewline
    \midrule
    \addlinespace[5pt]
    Windows & \tabularnewline
    \midrule
    \addlinespace[5pt]
    Blinds / Curtains & \tabularnewline
    \midrule
    \end{tabular}
    \end{table}
    <?php
}
?>

\begin{table}[h]
\begin{tabular}{>{\raggedleft}m{3.5cm}>{\centering}p{360pt}}
 & \textbf{\textsc{\large General}}\tabularnewline
\addlinespace[5pt]
Locks & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
<?php
if ($data['hasGarage']) {
    ?>
    \addlinespace[5pt]
    Garage & \multirow{1}{360pt}[5pt]{}\tabularnewline
    \midrule
    <?php
}
?>
\addlinespace[5pt]
Grounds & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Rubbish bins & \multirow{1}{360pt}[5pt]{}\tabularnewline
\midrule
\addlinespace[5pt]
Smoke alarms working & \multirow{1}{360pt}[5pt]{}\tabularnewline
\bottomrule
\end{tabular}
\end{table}


\end{document}