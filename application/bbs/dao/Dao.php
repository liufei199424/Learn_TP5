<?php
namespace app\bbs\dao;
use think\Db;
use think\Model;

class Dao {
    public static function getEntityByCond (Model $entity, $cond, $bind) {
        $table = $entity->getTableName();
        $sql = "select id from {$table} where 1 = 1 " . $cond . " limit 1 ";

        $entityid = Db::query($sql, $bind);

        return $entity->get($entityid[0]['id']);
    }

    public static function getListEntityByCond (Model $entity, $cond, $bind) {
        $table = $entity->getTableName();
        $sql = "select id from {$table} where 1 = 1 " . $cond;

        $entityids = Db::query($sql, $bind);

        $ids = [];
        foreach ($entityids as $userid) {
            $ids[] = $userid['id'];
        }
        
        if (! $ids) {
            return [];
        }

        $list = [];
        foreach ($ids as $id) {
            $list[] = $entity->get($id);
        }
        
        return $list;
    }

    public static function loadEntity (Model $entity, $sql, $bind) {
        $entityid = Db::query($sql, $bind);

        return $entity->get($entityid[0]['id']);
    }

    public static function loadEntityList (Model $entity, $sql, $bind) {
        $entityids = Db::query($sql, $bind);

        $ids = [];
        foreach ($entityids as $userid) {
            $ids[] = $userid['id'];
        }
        
        if (! $ids) {
            return [];
        }

        $list = [];
        foreach ($ids as $id) {
            $list[] = $entity->get($id);
        }
        
        return $list;
    }

    public static function getListEntityByCond4Page (Model $entity, $pagenum, $pagesize, $cond, $bind) {
        $table = $entity->getTableName();

        $sql = "select count(*) from {$table} where 1 = 1 " . $cond;
        $cnt = self::queryValue($sql, $bind);

        if ($cnt % $pagesize == 0) {
            $totalpage = $cnt / $pagesize;
        } else {
            $totalpage = floor($cnt / $pagesize) + 1;
        }

        if ($pagenum > $totalpage) {
            $pagenum = $totalpage;
        }

        if ($pagenum < 1) {
            $pagenum = 1;
        }

        $limitstr = " limit :startsize, :size ";
        $bind['startsize'] = ($pagenum - 1) * $pagesize;
        $bind['size'] = $pagesize;

        $sql = "select id from {$table} where 1 = 1 " . $cond . $limitstr;
        $entityids = Db::query($sql, $bind);

        $ids = [];
        foreach ($entityids as $userid) {
            $ids[] = $userid['id'];
        }

        if (! $ids) {
            return [];
        }
        
        $list = [];
        foreach ($ids as $id) {
            $list[] = $entity->get($id);
        }
        
        return $list;
    }

    public static function loadEntityList4Page (Model $entity, $pagenum, $pagesize, $sql, $bind) {
        $limitstr = " limit :startsize, :size ";
        $bind['startsize'] = ($pagenum - 1) * $pagesize;
        $bind['size'] = $pagesize;

        $sql .= $limitstr;

        $entityids = Db::query($sql, $bind);

        $ids = [];
        foreach ($entityids as $userid) {
            $ids[] = $userid['id'];
        }

        if (! $ids) {
            return [];
        }
        
        $list = [];
        foreach ($ids as $id) {
            $list[] = $entity->get($id);
        }
        
        return $list;
    }

    public static function queryValue ($sql, $bind = []) {
        $row = Db::query($sql, $bind);

        return array_values($row[0])[0];
    }
}
