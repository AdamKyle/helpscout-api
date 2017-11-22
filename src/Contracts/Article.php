<?php

namespace HelpscoutApi\Contracts;

interface Article {
    /**
     * Set name of article
     *
     * @param string
     */
    public function setName(string $name);

    /**
     * Set text of article
     *
     * @param string
     */
    public function setText(string $text);

    /**
     * Set collection name article belongs to
     *
     * @param string
     */
    public function setCollection(string $collection);

    /**
     * Set category name article belongs to
     *
     * @param string
     */
    public function setCategory(string $category);

    /**
     * Get id of article
     *
     * @return string
     */
    public function getId();

    /**
     * Get name of article
     *
     * @return string
     */
    public function getName();

    /**
     * Get collection artcile belongs to
     *
     * @return string
     */
    public function getCollection();

    /**
     * Get category article belongs to
     *
     * @return string
     */
    public function getCategory();

    /**
     * Get text for an article
     *
     * @return string
     */
    public function getText();
}
