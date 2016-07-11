<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebConfig
 *
 * @ORM\Table(name="web_config")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WebConfigRepository")
 */
class WebConfig {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="website_name", type="string", length=255, nullable=true)
     */
    private $websiteName;    

    /**
     * @var string
     *
     * @ORM\Column(name="website_description", type="string", length=255, nullable=true)
     */
    private $websiteDesc;    
    
    /**
     * @var bool
     *
     * @ORM\Column(name="bootstrap_enable", type="boolean")
     */
    private $bootstrapEnable;

    /**
     * @var string
     *
     * @ORM\Column(name="bootstrap_theme", type="string", length=255)
     */
    private $bootstrapTheme;

    /**
     * @var array
     */
    private $CDN = [
        'css' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        'js' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
        'jquery' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js',
        'theme' => [
            'cerulean' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cerulean/bootstrap.min.css',
            'cosmo' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cosmo/bootstrap.min.css',
            'cyborg' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cyborg/bootstrap.min.css',
            'darkly' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/darkly/bootstrap.min.css',
            'flatly' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/flatly/bootstrap.min.css',
            'journal' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/journal/bootstrap.min.css',
            'lumen' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/lumen/bootstrap.min.css',
            'paper' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/paper/bootstrap.min.css',
            'readable' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/readable/bootstrap.min.css',
            'sandstone' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/sandstone/bootstrap.min.css',
            'simplex' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/simplex/bootstrap.min.css',
            'slate' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/slate/bootstrap.min.css',
            'spacelab' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/spacelab/bootstrap.min.css',
            'superhero' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/superhero/bootstrap.min.css',
            'united' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/united/bootstrap.min.css',
            'yeti' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/yeti/bootstrap.min.css',
        ],
        'icons' => 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'
    ];

    public function __construct() {
        $this->updatedAt = new \DateTime;
        $this->bootstrapEnable = true;
        $this->bootstrapTheme = $this->$CDN['theme'][0];
    }

    /**
     * Get Bootstrap Base CSS
     *
     * @return integer
     */
    public function getbootstrapCSS() {
        return $this->CDN['css'];
    }
    
    /**
     * Get Bootstrap Base JS
     *
     * @return integer
     */
    public function getbootstrapJS() {
        return $this->CDN['js'];
    }    

    /**
     * Get Bootstrap Themes
     *
     * @return integer
     */
    public function getThemeConfig() {
        return $this->CDN['theme'];
    }

    /**
     * Get Jquery Base JS
     *
     * @return integer
     */
    public function getjQuery() {
        return $this->CDN['jquery'];
    }    
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return WebConfig
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Set bootstrapEnable
     *
     * @param boolean $bootstrapEnable
     *
     * @return WebConfig
     */
    public function setBootstrapEnable($bootstrapEnable) {
        $this->bootstrapEnable = $bootstrapEnable;

        return $this;
    }

    /**
     * Get bootstrapEnable
     *
     * @return boolean
     */
    public function getBootstrapEnable() {
        return $this->bootstrapEnable;
    }

    /**
     * Set bootstrapTheme
     *
     * @param string $bootstrapTheme
     *
     * @return WebConfig
     */
    public function setBootstrapTheme($bootstrapTheme) {
        $this->bootstrapTheme = $bootstrapTheme;

        return $this;
    }

    /**
     * Get bootstrapTheme
     *
     * @return string
     */
    public function getBootstrapTheme() {
        return $this->bootstrapTheme;
    }

    /**
     * Set websiteName
     *
     * @param string $websiteName
     *
     * @return WebConfig
     */
    public function setWebsiteName($websiteName)
    {
        $this->websiteName = $websiteName;

        return $this;
    }

    /**
     * Get websiteName
     *
     * @return string
     */
    public function getWebsiteName()
    {
        return $this->websiteName;
    }

    /**
     * Set websiteDesc
     *
     * @param string $websiteDesc
     *
     * @return WebConfig
     */
    public function setWebsiteDesc($websiteDesc)
    {
        $this->websiteDesc = $websiteDesc;

        return $this;
    }

    /**
     * Get websiteDesc
     *
     * @return string
     */
    public function getWebsiteDesc()
    {
        return $this->websiteDesc;
    }
}
