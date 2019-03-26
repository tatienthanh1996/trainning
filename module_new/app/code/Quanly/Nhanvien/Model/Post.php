<?php
namespace Quanly\Nhanvien\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'quanly_nhanvien_post';

    protected $_cacheTag = 'quanly_nhanvien_post';

    protected $_eventPrefix = 'quanly_nhanvien_post';

    protected function _construct()
    {
        $this->_init('Quanly\Nhanvien\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
