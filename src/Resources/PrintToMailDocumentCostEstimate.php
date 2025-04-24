<?php

namespace SeanKndy\SonarApi\Resources;

class PrintToMailDocumentCostEstimate extends BaseResource
{
    /**
     * The print method for the print to mail batch.
     */
    public string $printMethod;

    /**
     * The print type for the print to mail batch.
     */
    public string $printType;

    /**
     * The number of digital pages in the document/invoice.
     */
    public int $numberOfDigitalPages;

    /**
     * The estimated print to mail cost for a single document/invoice.
     */
    public int $costEstimate;

}