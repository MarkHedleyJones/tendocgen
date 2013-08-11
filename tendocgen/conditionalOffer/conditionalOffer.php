\documentclass[10pt,oneside,british]{scrbook}
\renewcommand{\rmdefault}{cmr}
\usepackage[scaled=0.92]{helvet}
\renewcommand{\familydefault}{\sfdefault}
\usepackage[T1]{fontenc}
\usepackage[utf8]{inputenc}
\usepackage[a4paper]{geometry}
\geometry{verbose,tmargin=0cm,bmargin=0cm,lmargin=2cm,rmargin=2cm}
\usepackage{fancyhdr}
\pagestyle{fancy}
\setcounter{secnumdepth}{3}
\setcounter{tocdepth}{3}

\makeatletter

\providecommand{\tabularnewline}{\\}

\lhead{www.houser.co.nz}

\makeatother

\usepackage{babel}
\begin{document}

\chapter*{CONDITIONAL OFFER OF TENANCY}

\noindent \textbf{\large <?php echo $data['tenancyAddress']; ?>}{\large \par}


\noindent This document constitutes a formal offer of tenancy to the
selected applicant(s) subject to the following conditions.


\section*{Landlord:}

\begin{tabular}{rl}
\noalign{\vskip10pt}
Name: & <?php echo ($data['landlordName'] != False ? $data['landlordName'] : '\rule{80mm}{0.6pt}'); ?>\tabularnewline
\noalign{\vskip10pt}
Address for service: & <?php echo ($data['addressForService'] != False ? $data['addressForService'] : '\rule{80mm}{0.6pt}'); ?>\tabularnewline
\noalign{\vskip10pt}
Phone (daytime): & <?php echo ($data['landlordPhoneDay'] != False ? $data['landlordPhoneDay'] : '\rule{50mm}{0.6pt}'); ?>\tabularnewline
\noalign{\vskip10pt}
Phone (evening): & <?php echo ($data['landlordPhoneEve'] != False ? $data['landlordPhoneEve'] : '\rule{50mm}{0.6pt}'); ?>\tabularnewline
\noalign{\vskip10pt}
Phone (cellular): & <?php echo ($data['landlordPhoneCell'] != False ? $data['landlordPhoneCell'] : '\rule{50mm}{0.6pt}'); ?>\tabularnewline
\noalign{\vskip10pt}
Email: & <?php echo ($data['landlordEmail'] != False ? $data['landlordEmail'] : '\rule{50mm}{0.6pt}'); ?>\tabularnewline
\end{tabular}

\section*{Tenant:}
\begin{itemize}
\item \textbf{Name: }%
\begin{tabular}{cc}
Surname: \rule{150pt}{0.6pt} & First names: \rule{161pt}{0.6pt}\tabularnewline
\end{tabular}
\item \textbf{Service address: }\rule{380pt}{0.6pt}
\item \textbf{Contact details:}\vspace{4mm}
\\
\begin{tabular}{ccc}
Phone: \rule{100pt}{0.6pt} & Cell: \rule{100pt}{0.6pt} & Email: \rule{145pt}{0.6pt}\tabularnewline
\end{tabular}
\end{itemize}

\section*{Conditions:}

Tenancy is offered to the above tenant subject to the following conditions:
\begin{enumerate}
\item On or before the <?php echo ($data['tenancyDateStart'] != False ? date('jS \o\f F Y',strtotime($data['tenancyDateStart'])) : '\enskip{}\rule{30pt}{0.6pt}/ \rule{30pt}{0.6pt} / \rule{40pt}{0.6pt}\enskip{}'); ?>
\item The payment of <?php echo ($data['bond_weeks'] != False ? intToString($data['bond_weeks']) : '\rule{10mm}{0.6pt}'); ?> weeks bond (\<?php echo ($data['bond_weeks'] != False ? money_format('$%.2n', $data['weeklyRent'] * $data['bond_weeks']) : '$ \rule{20mm}{0.6pt} . \rule{10mm}{0.6pt}'); ?>) is made, \emph{and}
\item The payment of <?php echo ($data['rentAdvance_weeks'] != False ? intToString($data['rentAdvance_weeks']) : '\rule{10mm}{0.6pt}'); ?> weeks rent in advance (\<?php echo ($data['rentAdvance_weeks'] != False ? money_format('$%.2n', $data['weeklyRent'] * $data['rentAdvance_weeks']) : '$ \rule{20mm}{0.6pt} . \rule{10mm}{0.6pt}'); ?>) is made, \emph{and}
\item A written tenancy agreement is signed by the landlord and tenant,
\emph{and}
\item The landlord and tenant will meet on \enskip{}\rule{30pt}{0.6pt}
/ \rule{30pt}{0.6pt} / \rule{40pt}{0.6pt}\enskip{} to make payments
as set out above and to sign a tenancy agreement.
\end{enumerate}
\vspace{8mm}


\begin{center}
\textbf{\large If the prospective tenant does not meet any of the
above conditions the landlord has the right to withdraw this offer. }
\par\end{center}{\large \par}

\vspace{15mm}


\begin{tabular}{c}
Signed: \rule{200pt}{0.6pt} \quad{}(landlord)\tabularnewline
\end{tabular}
\end{document}