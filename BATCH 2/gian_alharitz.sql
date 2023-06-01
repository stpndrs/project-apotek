-- This script was generated by the ERD tool in pgAdmin 4.
-- Please log an issue at https://redmine.postgresql.org/projects/pgadmin4/issues/new if you find any bugs, including reproduction steps.
BEGIN;


CREATE TABLE IF NOT EXISTS public.tb_detail_transaksi
(
    id_detail_transaksi character varying(25) COLLATE pg_catalog."default" NOT NULL,
    id_transaksi character varying(100) COLLATE pg_catalog."default" NOT NULL,
    id_obat character varying(100) COLLATE pg_catalog."default" NOT NULL,
    qty integer NOT NULL,
    sub_total bigint NOT NULL,
    CONSTRAINT tb_detail_transaksi_pkey PRIMARY KEY (id_detail_transaksi)
);

CREATE TABLE IF NOT EXISTS public.tb_jenis_obat
(
    id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 100 CACHE 1 ),
    jenis_obat character varying(25) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT tb_jenis_obat_pkey PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS public.tb_karyawan
(
    id_karyawan integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 100 CACHE 1 ),
    nama_pegawai character varying(30) COLLATE pg_catalog."default" NOT NULL,
    jenis_kelamin type_jenis_kelamin NOT NULL,
    "no.telp" character varying(12) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT tb_karyawan_pkey PRIMARY KEY (id_karyawan)
);

CREATE TABLE IF NOT EXISTS public.tb_kategori_obat
(
    id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 100 CACHE 1 ),
    nama_kategori character varying(30) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT tb_kategori_obat_pkey PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS public.tb_obat
(
    id_obat character varying(100) COLLATE pg_catalog."default" NOT NULL DEFAULT gen_random_uuid(),
    nama_obat character varying(25) COLLATE pg_catalog."default" NOT NULL,
    harga_jual integer NOT NULL,
    id_jenis_obat integer NOT NULL,
    id_kategori_obat integer NOT NULL,
    stock_obat type_stock_obat NOT NULL,
    jumlah_stock integer,
    id_rak integer,
    gambar_obat character varying(100) COLLATE pg_catalog."default",
    CONSTRAINT tb_obat_pkey PRIMARY KEY (id_obat)
);

CREATE TABLE IF NOT EXISTS public.tb_rak_obat
(
    id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 100 CACHE 1 ),
    nama_rak character varying(50) COLLATE pg_catalog."default" NOT NULL,
    lokasi_rak character varying(50) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT tb_rak_obat_pkey PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS public.tb_transaksi
(
    kode_transaksi character varying(100) COLLATE pg_catalog."default" NOT NULL DEFAULT gen_random_uuid(),
    tanggal timestamp with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_user character varying COLLATE pg_catalog."default" NOT NULL,
    jumlah_obat integer NOT NULL,
    total bigint NOT NULL,
    CONSTRAINT tb_transaksi_pkey PRIMARY KEY (kode_transaksi)
);

CREATE TABLE IF NOT EXISTS public.tb_user
(
    id_user character varying(100) COLLATE pg_catalog."default" NOT NULL DEFAULT gen_random_uuid(),
    username character varying(25) COLLATE pg_catalog."default" NOT NULL,
    password character varying(12) COLLATE pg_catalog."default" NOT NULL,
    level type_user_level NOT NULL,
    id_karyawan integer NOT NULL,
    CONSTRAINT tb_user_pkey PRIMARY KEY (id_user)
);

ALTER TABLE IF EXISTS public.tb_detail_transaksi
    ADD CONSTRAINT fk_id_obat FOREIGN KEY (id_obat)
    REFERENCES public.tb_obat (id_obat) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.tb_detail_transaksi
    ADD CONSTRAINT fk_id_transaksi FOREIGN KEY (id_transaksi)
    REFERENCES public.tb_transaksi (kode_transaksi) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.tb_obat
    ADD CONSTRAINT fk_id_jenis_obat FOREIGN KEY (id_jenis_obat)
    REFERENCES public.tb_jenis_obat (id) MATCH SIMPLE
    ON UPDATE CASCADE
    ON DELETE CASCADE;


ALTER TABLE IF EXISTS public.tb_obat
    ADD CONSTRAINT fk_id_kategori_obat FOREIGN KEY (id_kategori_obat)
    REFERENCES public.tb_kategori_obat (id) MATCH SIMPLE
    ON UPDATE CASCADE
    ON DELETE CASCADE;


ALTER TABLE IF EXISTS public.tb_obat
    ADD CONSTRAINT fk_id_rak FOREIGN KEY (id_rak)
    REFERENCES public.tb_rak_obat (id) MATCH SIMPLE
    ON UPDATE CASCADE
    ON DELETE CASCADE;


ALTER TABLE IF EXISTS public.tb_transaksi
    ADD CONSTRAINT fk_id_user FOREIGN KEY (id_user)
    REFERENCES public.tb_user (id_user) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.tb_user
    ADD CONSTRAINT fk_id_karyawan FOREIGN KEY (id_karyawan)
    REFERENCES public.tb_karyawan (id_karyawan) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;

END;