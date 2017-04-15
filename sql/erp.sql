/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50614
Source Host           : 127.0.0.1:3306
Source Database       : erp

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2015-05-17 12:30:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bahan
-- ----------------------------
DROP TABLE IF EXISTS `bahan`;
CREATE TABLE `bahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bahan
-- ----------------------------
INSERT INTO `bahan` VALUES ('1', 'Kain Putih', '101', 'Satin 10 Meter<br>');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'Aditya', 'Malang', '0321446', 'adit@mail.com');

-- ----------------------------
-- Table structure for invoice
-- ----------------------------
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` int(11) DEFAULT NULL,
  `produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cust_idx` (`customer`),
  KEY `produk_idx` (`produk`),
  CONSTRAINT `cust` FOREIGN KEY (`customer`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `produk` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of invoice
-- ----------------------------
INSERT INTO `invoice` VALUES ('2', '1', '1', '2', '50000', '1', 'sesuai produk<br>', null);
INSERT INTO `invoice` VALUES ('3', '1', '1', '2', '500000', '1', 'produk<br>', null);
INSERT INTO `invoice` VALUES ('4', '1', '1', '1', '30000', '1', 'desain terlampir<br>', null);

-- ----------------------------
-- Table structure for keuangan
-- ----------------------------
DROP TABLE IF EXISTS `keuangan`;
CREATE TABLE `keuangan` (
  `tanggal` datetime DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keperluan` varchar(100) NOT NULL,
  `divisi` varchar(45) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `validasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keuangan
-- ----------------------------
INSERT INTO `keuangan` VALUES ('2015-05-13 00:00:00', '1', 'Penjualan Produk', 'M/S', '500000', '0', '1');
INSERT INTO `keuangan` VALUES ('2015-05-14 00:00:00', '2', 'Penjualan Produk', 'M/S', '30000', '0', '1');
INSERT INTO `keuangan` VALUES ('2015-05-17 00:00:00', '3', 'Pengadaan Barang', 'SCM', '45000', '1', '1');
INSERT INTO `keuangan` VALUES ('2015-05-17 00:00:00', '4', 'Open Tender', 'SCM', '10000', '0', '0');

-- ----------------------------
-- Table structure for open_tender
-- ----------------------------
DROP TABLE IF EXISTS `open_tender`;
CREATE TABLE `open_tender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of open_tender
-- ----------------------------
INSERT INTO `open_tender` VALUES ('1', 'Mesin Cat', '2015-05-17 00:00:00', '2015-05-23 00:00:00', 'Mesin cat super kuat<br>', '0');

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supply` (`supplier`),
  CONSTRAINT `supply` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES ('1', 'Kain Putih', '100', '1', '45000', 'Kain bahan satin<br>', '0');

-- ----------------------------
-- Table structure for penawaran
-- ----------------------------
DROP TABLE IF EXISTS `penawaran`;
CREATE TABLE `penawaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tender` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_idx` (`supplier`),
  KEY `tender_idx` (`tender`),
  CONSTRAINT `supplier` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tender` FOREIGN KEY (`tender`) REFERENCES `open_tender` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penawaran
-- ----------------------------
INSERT INTO `penawaran` VALUES ('1', '1', '1', '10000', 'tes<br>', '1');

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES ('1', 'baju polo', '1', '100', 'kain katun');

-- ----------------------------
-- Table structure for request
-- ----------------------------
DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of request
-- ----------------------------
INSERT INTO `request` VALUES ('1', '1', '2', 'tambah stok<br>', '1', '0');
INSERT INTO `request` VALUES ('2', 'Kain Polos', '200', 'Kain dengan bahan satin<br>', '2', '0');
INSERT INTO `request` VALUES ('3', 'Pewarna Pakaian Merah', '10', 'Pewarna Pakaian merk X<br>', '2', '1');
INSERT INTO `request` VALUES ('4', 'baju polo', '10', '', '1', '1');

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kordinator` varchar(45) NOT NULL,
  `telepon` varchar(41) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES ('1', 'CV Maju Jaya', 'Jl Margonda', 'Andi Jaya', '03214634', 'andi@mail.com');
INSERT INTO `supplier` VALUES ('2', 'CV Abadi', 'jl ketintang', 'budi anduk', 'anduk@mail.com', '');

-- ----------------------------
-- Table structure for sys_group
-- ----------------------------
DROP TABLE IF EXISTS `sys_group`;
CREATE TABLE `sys_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_group
-- ----------------------------
INSERT INTO `sys_group` VALUES ('1', 'admin', null);
INSERT INTO `sys_group` VALUES ('2', 'a/f', null);
INSERT INTO `sys_group` VALUES ('3', 'ms', null);
INSERT INTO `sys_group` VALUES ('4', 'warehouse', null);
INSERT INTO `sys_group` VALUES ('5', 'scm', null);
INSERT INTO `sys_group` VALUES ('6', 'produksi', null);

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_idx` (`group`),
  CONSTRAINT `group` FOREIGN KEY (`group`) REFERENCES `sys_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES ('1', '2015-05-13 08:07:41', null, 'admin', '9c69c2e28557a737ffc2d3aad9160b76', null, '1', 'admin', 'admin', '1');
INSERT INTO `sys_user` VALUES ('2', '2015-05-13 13:56:35', null, 'marketing', 'b3ec79604b87637941c697ed766bf9e0', 'marketing@mail.com', '1', 'marketing', 'sales', '3');
INSERT INTO `sys_user` VALUES ('3', '2015-05-14 03:04:55', null, 'accounting', 'b3ec79604b87637941c697ed766bf9e0', 'accounting@mail.com', '1', 'accounting', 'finance', '2');
INSERT INTO `sys_user` VALUES ('4', '2015-05-14 03:05:16', null, 'warehouse', 'b3ec79604b87637941c697ed766bf9e0', 'warehouse@mail.com', '1', 'warehouse', '', '4');
