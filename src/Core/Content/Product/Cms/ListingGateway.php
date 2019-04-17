<?php declare(strict_types=1);

namespace Shopware\Core\Content\Product\Cms;

use Shopware\Core\Content\Product\SalesChannel\SalesChannelProductRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Symfony\Component\HttpFoundation\Request;

class ListingGateway implements ListingGatewayInterface
{
    /**
     * @var SalesChannelProductRepository
     */
    private $productRepository;

    public function __construct(SalesChannelProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function search(Request $request, SalesChannelContext $context): EntitySearchResult
    {
        $criteria = new Criteria();

        return $this->productRepository->search($criteria, $context);
    }
}
