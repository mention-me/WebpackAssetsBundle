<?php

namespace ju1ius\WebpackAssetsBundle\Twig;

use ju1ius\WebpackAssetsBundle\Helper\AssetHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * @author ju1ius
 */
class WebpackAssetsExtension extends AbstractExtension
{
    /**
     * @var \ju1ius\WebpackAssetsBundle\Helper\AssetHelper
     */
    private $assetHelper;

    public function __construct(AssetHelper $assetHelper)
    {
        $this->assetHelper = $assetHelper;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('webpack_asset', [$this, 'getAssetUrl']),
        ];
    }

    public function getAssetUrl($bundle, $type='js')
    {
        return $this->assetHelper->getAssetUrl($bundle, $type);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'ju1ius_webpack_assets';
    }
}
