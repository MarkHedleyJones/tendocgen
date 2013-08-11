\documentclass[10pt,oneside,british]{scrbook}
\renewcommand{\rmdefault}{cmr}
\usepackage[scaled=0.92]{helvet}
\renewcommand{\familydefault}{\sfdefault}
\usepackage[T1]{fontenc}
\usepackage[utf8]{inputenc}
\usepackage[a4paper]{geometry}
\geometry{verbose,tmargin=2cm,bmargin=2cm,lmargin=2cm,rmargin=2cm}
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
\usepackage{graphicx}

\makeatletter

\providecommand{\tabularnewline}{\\}

\lhead{www.tendocgen.co.nz}

\makeatother

\usepackage{babel}
\begin{document}

\part*{RESIDENTIAL TENANCY AGREEMENT\vspace{15mm}
\protect \\
\textmd{\textit{\LARGE <?php echo $data['tenancyAddress']; ?>}}}


\chapter*{Information about this agreement:}
\begin{enumerate}
\item This tenancy agreement complies with the provisions of the Residential
Tenancies Act 1986.
\item This agreement is binding on the tenant and landlord.
\item The tenant's application form is considered part of this tenancy agreement.
\item Parties to this agreement are subject to the Privacy Act 1993.
\item The tenant should ensure they look after their copy of this agreement,
and store it in a safe place.
\item All pages attached to this agreement are considered part of this agreement,
including:

\begin{enumerate}
\item Tenancy Agreement
<?php
if ($data['tenancyPeriodic'] || $data['tenancyTerm'] == 0) {
    ?>
    \item Periodic Tenancy
    <?php
}
else {
    ?>
    \item Fixed Term Tenancy
    <?php
}
?>
\item Incoming Property Inspection Form
\item Landlord and Tenant Responsibilities
<?php
if ($data['catsAllowed']) {
    ?>
    \item Pet Clause
    <?php
}
if ($data['dogsAllowed']) {
    ?>
    \item Dog Clause
    <?php
}
?>
\end{enumerate}
\item Nothing in this agreement written of verbal can be taken as an offer
of a `right of renewal' to the tenant.
\item The conditions of this agreement must be compiled with during the
term of the agreement.
\item The bond paid by the tenant will be lodged with the Department of
Building and Housing.
\item The landlord will conduct regular inspections of the property, generally
once every three months, but these can be monthly.
\item Any damage or maintenance issues \textit{must} be discussed with the
landlord \textit{immediately} once they arise.
\end{enumerate}
\newpage{}


\chapter*{Tenancy Agreement}


\section*{Tenancy details:}

\begin{tabular}{ll}
\noalign{\vskip10pt}
Address of tenancy: & <?php echo $data['tenancyAddress']; ?>\tabularnewline
\noalign{\vskip10pt}
Rent per week: & \<?php echo money_format('$%.2n',$data['weeklyRent']); ?> to be paid in advance, <?php if ($data['rentAdvance_weeks'] == 1) echo 'weekly.'; else echo 'fortnightly.'?>\tabularnewline
\noalign{\vskip10pt}
Bond amount: & \<?php echo money_format('$%.2n', $data['weeklyRent'] * $data['bond_weeks']); ?> (as <?php echo intToString($data['bond_weeks']); ?> weeks bond)\tabularnewline
\noalign{\vskip10pt}
<?php
if ($data['bodyCorporate'] != False) {
    ?>
    Body corporate rules: & Yes - see attached body corporate rules.\tabularnewline
    \noalign{\vskip10pt}
    <?php
}
?>
\multicolumn{2}{l}{\textit{Rent to be paid by automatic payment into the following bank
account:}}\tabularnewline
\noalign{\vskip10pt}
Account name: & <?php echo $data['bankAccount_name']; ?>\tabularnewline
\noalign{\vskip10pt}
Account number: & <?php echo $data['bankAccount_number']; ?>\tabularnewline
\noalign{\vskip10pt}
Branch: & <?php echo $data['bankAccount_branch']; ?>\tabularnewline
\noalign{\vskip10pt}
Bank: & <?php echo $data['bankAccount_bank']; ?>\tabularnewline
<?php if ($data['payment_reference'] != ''){
    ?>
    \noalign{\vskip10pt}
    \multicolumn{2}{l}{\textit{Please use the following reference when making payments: <?php echo $data['paymentRef']; ?>}}\tabularnewline
    <?php
}?>
\end{tabular}

\section*{Landlord details:}

\begin{tabular}{rl}
\noalign{\vskip10pt}
Name: & <?php echo $data['landlordName']; ?>\tabularnewline
\noalign{\vskip10pt}
Physical address for service: & <?php echo $data['addressForService']; ?>\tabularnewline
\noalign{\vskip10pt}
Additional address for service: & <?php echo $data['addressForService2']; ?>\tabularnewline
\noalign{\vskip10pt}
Phone (daytime): & <?php echo ($data['landlordPhoneDay'] != False ? $data['landlordPhoneDay'] : '\rule{50mm}{0.6pt}'); ?>\tabularnewline
\noalign{\vskip10pt}
Phone (evening): & <?php echo ($data['landlordPhoneEve'] != False ? $data['landlordPhoneEve'] : '\rule{50mm}{0.6pt}'); ?>\tabularnewline
\noalign{\vskip10pt}
Phone (cellular): & <?php echo ($data['landlordPhoneCell'] != False ? $data['landlordPhoneCell'] : '\rule{50mm}{0.6pt}'); ?>\tabularnewline
\noalign{\vskip10pt}
Email: & <?php echo ($data['landlordEmail'] != False ? $data['landlordEmail'] : '\rule{50mm}{0.6pt}'); ?>\tabularnewline
\end{tabular}


\section*{Tenant details:}

\begin{tabular}{rc}
\noalign{\vskip10pt}
Name: & \rule{80mm}{0.6pt}\tabularnewline
\noalign{\vskip10pt}
Physical address for service: & \rule{80mm}{0.6pt}\tabularnewline
\noalign{\vskip10pt}
Additional address for service: & \rule{80mm}{0.6pt}\tabularnewline
\noalign{\vskip10pt}
Phone (daytime): & \rule{80mm}{0.6pt}\tabularnewline
\noalign{\vskip10pt}
Phone (evening): & \rule{80mm}{0.6pt}\tabularnewline
\noalign{\vskip10pt}
Email: & \rule{80mm}{0.6pt}\tabularnewline
\end{tabular}

\newpage{}


\chapter*{<?php if ($data['tenancyPeriodic'] || $data['tenancyTerm'] == 0) echo 'Periodic'; else echo 'Fixed term';?> tenancy}


\section*{The landlord and tenant agree that:}
\begin{enumerate}
<?php
if ($data['tenancyPeriodic'] || $data['tenancyTerm'] == 0) {
    ?>
    \item This tenancy will commence on the
    <?php echo date('jS \o\f F Y',strtotime($data['tenancyDateStart'])); ?>.
    \item This is a periodic tenancy and can be ended by either party giving
    the correct notice as required under the Residential Tenancies Act 1986.
    <?php
}
else {
    ?>
    \item This tenancy is for a \textbf{fixed term} and will start on the
    <?php echo date('jS \o\f F Y',strtotime($data['tenancyDateStart'])); ?>.
    \item And will end on the
    <?php echo date('jS \o\f F Y',strtotime($data['tenancyDateStart'] . ' + ' . $data['tenancyTerm'] . ' MONTHS - 1 DAYS')); ?>.
    \textit{\footnotesize{}
    (terminated by written notice given between
    <?php echo date('j/n/Y',strtotime($data['tenancyDateStart'] . ' + ' . $data['tenancyTerm'] . ' MONTHS - 91 DAYS')); ?> and
    <?php echo date('j/n/Y',strtotime($data['tenancyDateStart'] . ' + ' . $data['tenancyTerm'] . ' MONTHS - 22 DAYS')); ?>)}{\footnotesize \par}
    <?php
}
?>
\item The tenant is unconditionally prohibited from assigning or subletting
the tenancy
\item The landlord may review the rent from time to time and may increase
the rent in accordance with section 24 of the Residential Tenancies
Act 1986. No increase will take effect within 180 days after the commencement
of the tenancy of within 180 days after the data the last increase
took effect
\item This tenancy is subject to the Residential Tenancies Act 1986
\item A maximum of <?php echo $data['tenantsMax']; ?> people are to ordinarily
reside in the tenancy
\item Only the tenants stated on the tenancy agreement are to reside in
the tenancy
\item <?php
if ($data['catsAllowed'] > 0 || $data['dogsAllowed'] > 0) {
    ?>
    Pets are allowed at the tenancy subject to the attached pet clause
    <?php
}
else {
    ?>
    Pets are not allowed at the tenancy
    <?php
}
?>
\item Smoking is not allowed inside any of the buildings at the tenancy
\item The house and grounds are to be kept in a reasonably neat, clean and
tidy condition at all times
<?php
if ($data['guestParking'] == False) {
    ?>
    \item Only tenants vehicles are to be parked at the tenancy and in the designated
    areas
    <?php
}
?>
\item Vehicles may not be parked on the grass or garden areas
\item Nothing will be affixed to the walls, this includes nails, pins, Sellotape\textsuperscript{\textregistered{}},
Blu-Tack\textsuperscript{\textregistered{}} or similar fixing products.
\item The tenants and their guests must not disturb the neighbours or adjoining
tenants
\item The tenants are not to repair or alter any of the tenancy without
the landlord's consent, or unless it is urgently necessary to prevent
further damage and the landlord could not be contacted
\item Property inspections will be completed by the landlord after 48 hour's
notice has been given
\item The tenants must commercially clean the carpets on vacating - if they
are not left in a reasonably clean and tidy condition
\item The tenants have been issued with the following keys:%
\begin{tabular}{c}
\noalign{\vskip10pt}
\rule{150pt}{0.6pt}\tabularnewline
\noalign{\vskip10pt}
\rule{150pt}{0.6pt}\tabularnewline
\noalign{\vskip10pt}
\rule{150pt}{0.6pt}\tabularnewline
\noalign{\vskip10pt}
\rule{150pt}{0.6pt}\tabularnewline
\noalign{\vskip10pt}
\rule{150pt}{0.6pt}\tabularnewline
\end{tabular}
<?php
if ($data['waterCharges']) {
    ?>
    \item Water charges:

    \begin{enumerate}
    \item The water meter reading at the start of the tenancy is
    \item The waste water meter reading at the start of the tenancy is
    \end{enumerate}
    <?php
}
?>
\item The tenant is required to reimburse the landlord for any reasonable
expenses or commissions paid or incurred by the landlord in recovering,
or attempting to recover, any overdue payment that the tenancy owes
the landlord under the order of the Tenancy Tribunal
\item Nothing in this agreement, written of verbal can be taken as an offer
of a \textit{'right of renewal'} to the tenant
\end{enumerate}
\newpage{}

\chapter*{Landlord and Tenant Responsibilities}


\section*{Tenant Responsibilities:}
\begin{enumerate}
\item Pay the rent on time as set out in the tenancy agreement.
\item If the tenant misses any payments they must advise the landlord immediately.
\item If any of the tenant's particulars change during the tenancy, they
must advise the landlord within 10 working days.
\item Keep the property reasonably clean and tidy at all times, in particular:
inside the property, mow lawns, remove rubbish.
\item No parking on the lawns.
<?php
if ($data['catsAllowed'] > 0 || $data['dogsAllowed'] > 0) {
    ?>
    \item No pets are allowed as part of the tenancy, any visitor’s pets are
    to be kept outside at all times.
    <?php
}
?>
\item No smoking in any of the buildings at the tenancy.
\item Ensure the property is not at risk of fire at any time.
\item Ensure that condensation is kept to a minimum in the property.
\item Notify the landlord if any necessary repairs and maintenance as soon
as they become noticeable.
\item They or their guests must not damage the property, or disturb the
neighbours.
\item They are liable for any action on invited guest causes at their tenancy.
\item They must pay for the utility services, power, phone, gas, and as
also agreed in the tenancy agreement (e.g. water charges)
\item Must not disturb the neighbours or the landlord's other tenants.
\item Must not use the property for any unlawful purpose.
\item Must not alter the premises without the landlord's written permission.
\item The tenant is strongly advised to have contents insurance while in
this tenancy, but it is not compulsory.
\end{enumerate}

\section*{Landlord Responsibilities:}
\begin{enumerate}
\item Maintain the premises in a reasonable condition.
\item Comply with all regulation regarding building, health and safety.
\item Pay rates and insurances.
\item Will not interrupt the supply of electricity, gas, water or telephone
services to the property.
\end{enumerate}

\section*{Bond:}
\begin{itemize}
\item The bond covers any damage, cleaning or other losses to the landlord,
if the tenant does not comply with their obligations.
\end{itemize}

\section*{Rent Increases:}
\begin{itemize}
\item Periodic Tenancy: 60 days notice must be given by the landlord and
the increase is at most once every 180 days.
\item Fixed Term Tenancy: The manner of the rent increase is specified in
the Tenancy Agreement.
\end{itemize}

\section*{Landlord's Right of Entry:}
\begin{itemize}
\item At any time with the tenant's consent.
\item In an emergency.
\item For necessary repairs and maintenance - 24 hours' notice, between
8am and 7pm.
\item For regular property inspections - 48 hours' notice, between 8am and
7pm and only once every 4 weeks at most.
\item With the tenant's prior consent, to show prospective purchasers or
tenants through, or for a registered valuer.
\end{itemize}

\section*{Notice to End The Tenancy:}
\begin{itemize}
\item \textbf{Periodic Tenancy:} All notices to end the tenancy must be
in writing:

\begin{itemize}
\item \textbf{Tenant:} 21 days' notice,
\item \textbf{Landlord:} 90 days' notice, or 42%
\footnote{42 days' notice can only be given to the tenant if: A member of the
owner's family is to occupy the tenancy (as their principal place
of residence), or, it has been unconditionally sold with vacant possession,
or, the landlord customarily uses the tenancy for his employees. This
is stated on the agreement at the start of the tenancy, and the tenancy
is now required by one of their employees.%
} days' notice
\end{itemize}
\item \textbf{Fixed Term Tenancy:} To end this tenancy on the end date,
either the landlord or tenant must confirm this with written notice,
given 90 to 21 days from the end date of this tenancy. If no notice
is given by the landlord or tenant, this this tenancy becomes a periodic
tenancy.\end{itemize}

<?php
if ($data['catsAllowed'] > 0) {
    ?>
    \chapter*{Pet Clause:}


    \section*{The landlord and tenant agree that:}
    \begin{itemize}
    \item \rule{200pt}{0.6pt} (name of pet)
    \item Which is a: \rule{208pt}{0.6pt} (type of animal)
    \item Aged: \rule{100pt}{0.6pt} (years / months):
    \item Must be controlled by the tenant to comply with the council bylaws
    pertaining to that pet, \emph{and}
    \item \noindent (Tick one) %
    \begin{tabular}{l}
    $\square$ Must not be allowed inside the premises.\tabularnewline
    $\square$ Is allowed inside the premises on the condition that is
    controlled properly.\tabularnewline
    \end{tabular}
    \item This pet clause is specific to the pet named above and if it is removed
    or dies then no other pet can replace it.
    \item If any of these terms are breached, the landlord may follow standard
    procedures relating to breach of tenancy agreement.
    \item The tenant must care for the pet properly and comply with general
    SPCA standards and guidelines for the treatment of animals at all
    times; specifically, The Five Freedoms - see http://rnzspca.org.nz
    for more information.
    \end{itemize}

    \section*{The tenant must:}
    \begin{enumerate}
    \item Repair any damage to lawns, gardens, buildings or anything else at
    the tenancy as a result of the pet.
    \item Compensate the landlord for any damage or repairs due to the pet at
    the end of the tenancy.
    \item If the pet has been inside the premises and the carpets are not reasonably
    clean and tidy then the tenant must commercially clean the carpets.
    \end{enumerate}
    \begin{flushleft}
    \vspace{2cm}
    Signed: \rule{200pt}{0.6pt} (tenant)\vspace{1cm}
    \\
    Signed: \rule{200pt}{0.6pt} (landlord)
    \par\end{flushleft}
    <?php
}

if ($data['dogsAllowed'] > 0) {
    ?>
    \chapter*{Dog Clause:}


    \section*{The landlord and tenant agree that:}
    \begin{itemize}
    \item \rule{200pt}{0.6pt} (name of dog)
    \item Which is a: \rule{208pt}{0.6pt} (breed)
    \item With registration number: \rule{208pt}{0.6pt}
    \item Aged: \rule{100pt}{0.6pt} (years / months):
    \item Must be controlled by the tenant to comply with the council bylaws
    pertaining to that dog, \emph{and}
    \item Must be registered at all times, \emph{and}
    \item \noindent (Tick one) %
    \begin{tabular}{l}
    $\square$ Must not be allowed inside the premises.\tabularnewline
    $\square$ Is allowed inside the premises on the condition that is
    controlled properly.\tabularnewline
    \end{tabular}
    \item This dog clause is specific to the dog named above and if it is removed
    or dies then no other dog can replace it.
    \item If any of these terms are breached, the landlord may follow standard
    procedures relating to breach of tenancy agreement.
    \item The tenant must care for the dog properly and comply with general
    SPCA standards and guidelines for the treatment of animals at all
    times; specifically, The Five Freedoms - see http://rnzspca.org.nz
    for more information.
    \end{itemize}

    \section*{The tenant must:}
    \begin{enumerate}
    \item Immediately repair any damage to lawns, gardens, buildings or anything
    else at the tenancy as a result of the dog.
    \item Compensate the landlord for any damage or repairs due to the dog at
    the end of the tenancy.
    \item If the dog has been inside the premises and the carpets are not reasonably
    clean and tidy then the tenant must commercially clean the carpets.
    \end{enumerate}
    \begin{flushleft}
    \vspace{2cm}
    Signed: \rule{200pt}{0.6pt} (tenant)\vspace{1cm}
    \\
    Signed: \rule{200pt}{0.6pt} (landlord)
    \par\end{flushleft}
    <?php
}
?>
\end{document}
